from fastapi import FastAPI, UploadFile, File, Form, HTTPException
from fastapi.middleware.cors import CORSMiddleware
import numpy as np
import json
import io
from PIL import Image
import hashlib
from typing import List, Any, Dict

app = FastAPI(title="BioSync Face Recognition API (Simple)", version="1.0.0")

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
    return {"status": "ok", "service": "BioSync Face API (Simple)"}

# ─── Endpoint 1: Generate hash from image (simplified embedding) ───────────────

@app.post("/generate-embedding")
async def generate_embedding(file: UploadFile = File(...)) -> Dict[str, Any]:
    """
    Simplified version: generates a hash-based embedding from image
    """
    if not file.content_type or file.content_type not in ["image/jpeg", "image/png", "image/webp"]:
        raise HTTPException(status_code=400, detail="Unsupported image type. Use JPEG or PNG.")

    image_bytes = await file.read()

    # Limit to 10 MB
    if len(image_bytes) > 10 * 1024 * 1024:
        raise HTTPException(status_code=413, detail="Image too large (max 10 MB).")

    try:
        # Generate a hash-based "embedding" from the image
        hash_obj = hashlib.sha256(image_bytes)
        hash_hex = hash_obj.hexdigest()
        
        # Convert hash to numeric vector (simplified embedding)
        # Take first 32 characters and convert to numbers
        embedding = []
        for i in range(0, min(32, len(hash_hex)), 2):
            hex_pair = hash_hex[i:i+2]
            num = int(hex_pair, 16) / 255.0  # Normalize to 0-1
            embedding.append(num)
        
        # Pad or truncate to 128 dimensions (like real face_recognition)
        while len(embedding) < 128:
            embedding.append(0.0)
        embedding = embedding[:128]
        
        return {"encoding": embedding}
        
    except Exception as e:
        return {"error": f"Failed to process image: {str(e)}"}

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

# ─── Endpoint 3: Compare face images using hash similarity ─────────────────────

@app.post("/compare-face")
async def compare_face(
    file: UploadFile = File(...),
    stored_encoding: str = Form(...)
) -> Dict[str, Any]:
    """
    Simplified face comparison using hash-based similarity
    """
    if not file.content_type or file.content_type not in ["image/jpeg", "image/png", "image/webp"]:
        raise HTTPException(status_code=400, detail="Unsupported image type.")

    image_bytes = await file.read()

    if len(image_bytes) > 10 * 1024 * 1024:
        raise HTTPException(status_code=413, detail="Image too large (max 10 MB).")

    try:
        # Generate current image embedding
        current_result = await generate_embedding(file)
        
        if "error" in current_result:
            return {"match": False, "error": current_result["error"]}
        
        current_encoding = np.array(current_result["encoding"])
        
        # Parse stored encoding
        try:
            stored = np.array(json.loads(stored_encoding))
        except (json.JSONDecodeError, ValueError):
            raise HTTPException(status_code=400, detail="Invalid stored encoding format.")

        # Calculate similarity (using cosine similarity approximation)
        distance_val = float(np.linalg.norm(current_encoding - stored))
        
        # For hash-based comparison, use a more lenient threshold
        THRESHOLD = 0.3  # More lenient than real face recognition

        return {
            "match": bool(distance_val < THRESHOLD),
            "distance": float(round(distance_val, 4)),
            "threshold": float(THRESHOLD)
        }
        
    except Exception as e:
        return {"match": False, "error": f"Comparison failed: {str(e)}"}

# ─── Endpoint 4: Simple image validation ───────────────────────────────────────

@app.post("/validate-image")
async def validate_image(file: UploadFile = File(...)) -> Dict[str, Any]:
    """
    Simple image validation endpoint
    """
    if not file.content_type or file.content_type not in ["image/jpeg", "image/png", "image/webp"]:
        raise HTTPException(status_code=400, detail="Unsupported image type. Use JPEG or PNG.")

    image_bytes = await file.read()
    
    if len(image_bytes) > 10 * 1024 * 1024:
        raise HTTPException(status_code=413, detail="Image too large (max 10 MB).")
    
    try:
        # Try to open with PIL to validate it's a proper image
        image = Image.open(io.BytesIO(image_bytes))
        width, height = image.size
        
        return {
            "valid": True,
            "width": width,
            "height": height,
            "format": image.format,
            "size": len(image_bytes)
        }
    except Exception as e:
        return {"valid": False, "error": f"Invalid image: {str(e)}"}

if __name__ == "__main__":
    import uvicorn
    uvicorn.run("main_simple:app", host="0.0.0.0", port=8003, reload=True)
