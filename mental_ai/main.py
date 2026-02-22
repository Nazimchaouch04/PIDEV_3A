from fastapi import FastAPI, HTTPException, Body
from fastapi.middleware.cors import CORSMiddleware
from typing import List, Dict, Any
import analytics
import coach

app = FastAPI(title="BioSync Mental AI", version="2.0.0")

app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"], # In dev, adjust for production
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

@app.get("/")
async def root():
    return {"status": "ok", "service": "BioSync Mental AI Core"}

@app.post("/analyze/fatigue")
async def get_fatigue(timings: List[float] = Body(...)) -> Dict[str, Any]:
    """
    Endpoint to detect mental fatigue jitter.
    """
    return analytics.analyze_fatigue(timings)

@app.post("/analyze/prediction")
async def get_prediction(history: List[Dict[str, Any]] = Body(...)) -> Dict[str, Any]:
    """
    Endpoint to predict next performance trend.
    """
    return analytics.predict_performance_trend(history)

@app.post("/coach/advice")
async def get_advice(payload: Dict[str, Any] = Body(...)) -> Dict[str, Any]:
    """
    Endpoint for AI Coaching advice.
    Payload should contain 'user_data' and 'checkin_text'.
    """
    user_data = payload.get("user_data", {})
    checkin_text = payload.get("checkin_text", "")
    
    if not checkin_text:
        raise HTTPException(status_code=400, detail="Check-in text is required")
        
    advice = coach.get_coach_advice(user_data, checkin_text)
    return {"advice": advice}

if __name__ == "__main__":
    import uvicorn
    uvicorn.run("main:app", host="0.0.0.0", port=8002, reload=True)
