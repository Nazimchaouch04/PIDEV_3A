import numpy as np
import pandas as pd
from sklearn.linear_model import LinearRegression

def analyze_fatigue(timings: list) -> dict:
    """
    Analyzes mental fatigue using the Coefficient of Variation (CV) of response times.
    CV = (Standard Deviation / Mean)
    A high CV (instability/jitter) is a strong indicator of cognitive fatigue.
    """
    if len(timings) < 3:
        return {"level": "unknown", "score": 0, "message": "Pas assez de données pour l'analyse."}
    
    times = np.array(timings)
    mean_time = np.mean(times)
    std_time = np.std(times)
    
    cv = std_time / mean_time if mean_time > 0 else 0
    
    # Thresholds based on general cognitive science jitter metrics
    # < 0.15: Stable/Focused
    # 0.15 - 0.25: Mild instability
    # > 0.25: Significant fatigue (lapses)
    
    level = "stable"
    if cv > 0.25:
        level = "fatigue_haute"
    elif cv > 0.15:
        level = "fatigue_moderee"
        
    return {
        "level": level,
        "cv_score": float(round(cv, 3)),
        "mean_time": float(round(mean_time, 2)),
        "message": _get_fatigue_message(level)
    }

def predict_performance_trend(history: list) -> dict:
    """
    Predicts the next expected quiz score using a Linear Regression trendline.
    History: list of dicts with {'score': X, 'date': '...'}
    """
    if len(history) < 2:
        return {"trend": "neutral", "next_predicted_score": 0}
        
    scores = [h['score'] for h in history]
    X = np.array(range(len(scores))).reshape(-1, 1)
    y = np.array(scores)
    
    model = LinearRegression().fit(X, y)
    next_index = np.array([[len(scores)]])
    prediction = model.predict(next_index)[0]
    
    coefficient = model.coef_[0]
    trend = "stable"
    if coefficient > 1:
        trend = "upward"
    elif coefficient < -1:
        trend = "downward"
        
    return {
        "trend": trend,
        "next_predicted_score": float(round(max(0, min(100, prediction)), 1)),
        "slope": float(round(coefficient, 2))
    }

def _get_fatigue_message(level: str) -> str:
    messages = {
        "stable": "Ta concentration est optimale et stable. C'est le moment idéal pour des tâches complexes.",
        "fatigue_moderee": "On détecte une légère instabilité dans tes réponses. Fais une micro-pause de 2 min.",
        "fatigue_haute": "Attention : Instabilité cognitive détectée. Tes réflexes sont irréguliers. Repos recommandé."
    }
    return messages.get(level, "Analyse en cours...")
