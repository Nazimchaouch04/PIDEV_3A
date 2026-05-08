from fastapi import FastAPI, UploadFile, File, Form, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from deepface import DeepFace
import numpy as np
import json
import io
import tempfile
import os
from typing import List, Any, Dict
from PIL import Image

app = FastAPI(title="BioSync Face Recognition API (DeepFace)", version="1.0.0")

# Allow Symfony (localhost) to call this API
app.add_middleware(
    CORSMiddleware,
    allow_origins=["http://localhost:8000", "https://localhost:8000", "http://127.0.0.1:8000", "http://127.0.0.1:8001"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# ─── Health check ─────────────────────────────────────────────────────────────

@app.get("/")
async def health() -> Dict[str, str]:
    return {"status": "ok", "service": "BioSync Face API (DeepFace)"}

# ─── Endpoint 1: Generate embedding from a single image ───────────────────────

@app.post("/generate-embedding")
async def generate_embedding(file: UploadFile = File(...)) -> Dict[str, Any]:
    """
    Receives one face image and returns its embedding vector using DeepFace.
    """
    if not file.content_type or file.content_type not in ["image/jpeg", "image/png", "image/webp"]:
        raise HTTPException(status_code=400, detail="Unsupported image type. Use JPEG or PNG.")

    image_bytes = await file.read()

    if len(image_bytes) > 10 * 1024 * 1024:
        raise HTTPException(status_code=413, detail="Image too large (max 10 MB).")

    # Save to temp file for DeepFace
    with tempfile.NamedTemporaryFile(delete=False, suffix=".jpg") as tmp:
        tmp.write(image_bytes)
        tmp_path = tmp.name

    try:
        # Use DeepFace to extract embedding
        result = DeepFace.represent(img_path=tmp_path, model_name="VGG-Face", enforce_detection=True)
        
        if isinstance(result, list) and len(result) > 0:
            embedding = result[0]["embedding"]
            return {"encoding": embedding}
        else:
            return {"error": "No face detected in this image. Please adjust your position."}
            
    except ValueError as e:
        if "Face could not be detected" in str(e):
            return {"error": "No face detected in this image. Please adjust your position."}
        return {"error": f"Face detection error: {str(e)}"}
    except Exception as e:
        return {"error": f"Failed to process image: {str(e)}"}
    finally:
        if os.path.exists(tmp_path):
            os.unlink(tmp_path)

# ─── Endpoint 2: Average multiple encodings ───────────────────────────────────

@app.post("/average-encodings")
async def average_encodings(encodings_json: str = Form(...)) -> Dict[str, Any]:
    """
    Receives a list of N encoding vectors and returns their average
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

# ─── Endpoint 3: Compare face images ─────────────────────────────────────────

@app.post("/compare-face")
async def compare_face(
    file: UploadFile = File(...),
    stored_encoding: str = Form(...)
) -> Dict[str, Any]:
    """
    Compare a face image against a stored encoding using cosine similarity
    """
    if not file.content_type or file.content_type not in ["image/jpeg", "image/png", "image/webp"]:
        raise HTTPException(status_code=400, detail="Unsupported image type.")

    image_bytes = await file.read()

    if len(image_bytes) > 10 * 1024 * 1024:
        raise HTTPException(status_code=413, detail="Image too large (max 10 MB).")

    # Save to temp file
    with tempfile.NamedTemporaryFile(delete=False, suffix=".jpg") as tmp:
        tmp.write(image_bytes)
        tmp_path = tmp.name

    try:
        # Get current embedding
        result = DeepFace.represent(img_path=tmp_path, model_name="VGG-Face", enforce_detection=True)
        
        if isinstance(result, list) and len(result) > 0:
            current_embedding = np.array(result[0]["embedding"])
        else:
            return {"match": False, "error": "No face detected. Please look at the camera."}
            
        # Parse stored encoding
        stored = np.array(json.loads(stored_encoding))
        
        # Cosine similarity
        dot = np.dot(current_embedding, stored)
        norm1 = np.linalg.norm(current_embedding)
        norm2 = np.linalg.norm(stored)
        cosine_similarity = dot / (norm1 * norm2)
        
        # Convert to distance (0 = identical, 2 = opposite)
        distance = 1 - cosine_similarity
        
        # Threshold for VGG-Face (tune as needed)
        THRESHOLD = 0.4  # Lower = stricter
        
        return {
            "match": bool(distance < THRESHOLD),
            "distance": float(round(distance, 4)),
            "threshold": float(THRESHOLD),
            "similarity": float(round(cosine_similarity, 4))
        }
        
    except ValueError as e:
        if "Face could not be detected" in str(e):
            return {"match": False, "error": "No face detected. Please look at the camera."}
        return {"match": False, "error": str(e)}
    except Exception as e:
        return {"match": False, "error": f"Comparison failed: {str(e)}"}
    finally:
        if os.path.exists(tmp_path):
            os.unlink(tmp_path)
