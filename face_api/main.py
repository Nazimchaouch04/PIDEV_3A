from fastapi import FastAPI, UploadFile, File, Form, HTTPException
from fastapi.middleware.cors import CORSMiddleware
import face_recognition #Elle génère un vecteur numérique de 128 dimensions représentant un visage.
import numpy as np
import json
import io #lire image depuis mémoire
from typing import List, Any, Dict





app = FastAPI(title="BioSync Face Recognition API", version="1.0.0")

# Allow Symfony (localhost) to call this API
app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://localhost:8000", "https://localhost:8000", "http://127.0.0.1:8000"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# ─── Health check ─────────────────────────────────────────────────────────────

@app.get("/")
async def health() -> Dict[str, str]:
    return {"status": "ok", "service": "BioSync Face API"}


# ─── Endpoint 1: Generate embedding from a single image ───────────────────────

@app.post("/generate-embedding")
async def generate_embedding(file: UploadFile = File(...)) -> Dict[str, Any]:
    """
    Receives one face image and returns its 128-dimensional encoding vector.
    Used during Face ID setup to capture individual frames.
    """
    if not file.content_type or file.content_type not in ["image/jpeg", "image/png", "image/webp"]:
        raise HTTPException(status_code=400, detail="Unsupported image type. Use JPEG or PNG.")

    image_bytes = await file.read()

    # Limit to 10 MB
    if len(image_bytes) > 10 * 1024 * 1024:
        raise HTTPException(status_code=413, detail="Image too large (max 10 MB).")

    # Typecast for static analysis
    image_stream = io.BytesIO(bytes(image_bytes))
    image = face_recognition.load_image_file(image_stream)
    encodings = face_recognition.face_encodings(image)

    if len(encodings) == 0:
        return {"error": "No face detected in this image. Please adjust your position."}

    if len(encodings) > 1:
        return {"error": "Multiple faces detected. Please ensure only your face is visible."}

    return {"encoding": encodings[0].tolist()}


# ─── Endpoint 2: Average multiple encodings (iPhone-like setup) ───────────────

@app.post("/average-encodings")
async def average_encodings(encodings_json: str = Form(...)) -> Dict[str, Any]:
    """
    Receives a list of N encoding vectors (from N setup images) and returns
    their mathematical average — this is the master embedding stored in DB.
    """
    try:
        encodings_list = json.loads(encodings_json)
        if not isinstance(encodings_list, list) or len(encodings_list) < 1:
            raise ValueError("Invalid input")

        arrays = [np.array(e) for e in encodings_list]
        average = np.mean(arrays, axis=0)
        return {"averaged_encoding": average.tolist()}

    except (json.JSONDecodeError, ValueError) as e:
        raise HTTPException(status_code=400, detail=f"Bad encoding data: {e}")


# ─── Endpoint 3: Compare a face image against a stored encoding ───────────────

@app.post("/compare-face")
async def compare_face(
    file: UploadFile = File(...),
    stored_encoding: str = Form(...)
) -> Dict[str, Any]:
    """
    Receives a face image and a stored encoding (JSON string).
    Returns whether the face matches (distance < threshold).
    """
    if not file.content_type or file.content_type not in ["image/jpeg", "image/png", "image/webp"]:
        raise HTTPException(status_code=400, detail="Unsupported image type.")

    image_bytes = await file.read()

    if len(image_bytes) > 10 * 1024 * 1024:
        raise HTTPException(status_code=413, detail="Image too large (max 10 MB).")

    # Typecast for static analysis
    image_stream = io.BytesIO(bytes(image_bytes))
    image = face_recognition.load_image_file(image_stream)
    encodings = face_recognition.face_encodings(image)

    if len(encodings) == 0:
        return {"match": False, "error": "No face detected. Please look at the camera."}

    if len(encodings) > 1:
        return {"match": False, "error": "Multiple faces detected."}

    try:
        stored = np.array(json.loads(stored_encoding))
    except (json.JSONDecodeError, ValueError):
        raise HTTPException(status_code=400, detail="Invalid stored encoding format.")

    new_encoding = encodings[0]
    distance_val = float(np.linalg.norm(new_encoding - stored))

    # Threshold: 0.6 is the recommended dlib sweet-spot (lower = stricter)
    THRESHOLD = 0.55

    return {
        "match": bool(distance_val < THRESHOLD),
        "distance": float(round(distance_val, 4)),
        "threshold": float(THRESHOLD)
    }

