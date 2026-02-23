import os
import sys
from openai import OpenAI
from dotenv import load_dotenv

# Forcer l'encodage UTF-8
if sys.version_info[0] >= 3:
    import locale
    try:
        locale.setlocale(locale.LC_ALL, 'fr_FR.UTF-8')
    except:
        try:
            locale.setlocale(locale.LC_ALL, 'French_France.1252')
        except:
            pass

load_dotenv()

client = None
try:
    if os.getenv("OPENAI_API_KEY"):
        client = OpenAI(api_key=os.getenv("OPENAI_API_KEY"))
except Exception:
    client = None

SYSTEM_PROMPT = """
Tu es BioSync Coach, un expert en psychologie du sport et bien-être mental.
Ton rôle est d'analyser le "Check-in" de l'utilisateur et ses données physiologiques 
(sport, nutrition, fatigue cognitive) pour donner un conseil court, motivant et scientifique.

CONSIGNES :
1. Sois empathique mais professionnel.
2. Utilise les données fournies (ex: "Je vois que tu as fait du sport ce matin").
3. Si la fatigue est haute, conseille impérativement du repos ou une activité douce.
4. Réponds toujours en français.
5. Garde tes réponses sous 3-4 phrases.
"""

def get_coach_advice(user_data: dict, checkin_text: str) -> str:
    """
    Generates personalized advice based on user context and their input.
    """
    if not client:
        return get_fallback_advice(user_data, checkin_text)
    
    context = f"""
    CONTEXTE UTILISATEUR :
    - Fatigue détectée : {user_data.get('fatigue_level', 'inconnu')}
    - Dernier score sport : {user_data.get('last_sport_score', 'N/A')}
    - Calories moyennes : {user_data.get('avg_calories', 'N/A')} kcal
    - Dernier score mental : {user_data.get('last_mental_score', 'N/A')}/100
    
    MESSAGE UTILISATEUR :
    "{checkin_text}"
    """
    
    try:
        response = client.chat.completions.create(
            model="gpt-4o",
            messages=[
                {"role": "system", "content": SYSTEM_PROMPT},
                {"role": "user", "content": f"Contexte: {user_data}\n\nCheck-in: {checkin_text}"}
            ],
            max_tokens=200,
            temperature=0.7
        )
        
        return response.choices[0].message.content.strip()
    except Exception as e:
        print(f"OpenAI API Error: {e}")
        return get_fallback_advice(user_data, checkin_text)

def get_fallback_advice(user_data: dict, checkin_text: str) -> str:
    """
    Fallback advice when OpenAI is not available
    """
    fatigue_level = user_data.get('fatigue_level', 'stable')
    last_mental_score = user_data.get('last_mental_score', 50)
    
    # Analyse simple du check-in
    checkin_lower = checkin_text.lower()
    
    if 'fatigu' in checkin_lower or 'épuisé' in checkin_lower:
        return "Je sens que tu es fatigué. Prends une pause de 10 minutes, hydrate-toi et fais quelques étirements légers. Ton corps a besoin de récupérer."
    
    elif 'stress' in checkin_lower or 'anxieux' in checkin_lower:
        return "Le stress est normal. Respire profondément pendant 2 minutes (4 secondes inspiration, 4 secondes expiration). Ça va aider à calmer ton système nerveux."
    
    elif 'bien' in checkin_lower or 'bon' in checkin_lower:
        return "Super que tu te sentes bien ! C'est le moment idéal pour te concentrer sur des tâches importantes. Continue comme ça !"
    
    elif fatigue_level == 'haute':
        return "Ta fatigue cognitive est élevée. Opte pour des tâches simples et fais une pause toutes les 30 minutes. Ton cerveau a besoin de récupérer."
    
    elif last_mental_score < 60:
        return "Tes scores mentaux pourraient s'améliorer. Essaie des exercices de concentration courts (5-10 minutes) et une bonne nuit de sommeil."
    
    else:
        return "Merci pour ton check-in ! Continue à écouter ton corps et ton mental. La régularité est la clé du bien-être."
