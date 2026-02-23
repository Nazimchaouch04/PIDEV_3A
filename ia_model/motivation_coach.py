from flask import Flask, request, jsonify
from groq import Groq
import os
from dotenv import load_dotenv

load_dotenv()

app = Flask(__name__)
client = Groq(api_key=os.environ.get("GROQ_API_KEY"))

@app.route('/motivation', methods=['POST'])
def motivation():
    data = request.json
    
    humeur  = data['humeur']
    energie = data['energie']
    sommeil = data['sommeil']
    stress  = data['stress']

    prompt = f"""
    Tu es un coach sportif et psychologue du sport.
    L'utilisateur veut faire une séance de sport avec cet état :
    - Humeur : {humeur}
    - Niveau d'énergie : {energie}/5
    - Heures de sommeil : {sommeil} heures
    - Niveau de stress : {stress}

    Génère une réponse structurée avec exactement ces 4 sections :
    1. MESSAGE MOTIVANT : (message personnalisé selon son humeur)
    2. SÉANCE ADAPTÉE : (exercices adaptés à son état)
    3. DURÉE RECOMMANDÉE : (durée en minutes)
    4. CONSEIL RÉCUPÉRATION : (conseil si fatigué ou stressé)

    Réponds en français, de manière bienveillante et encourageante.
    """

    response = client.chat.completions.create(
        model="llama3-8b-8192",
        messages=[{"role": "user", "content": prompt}],
        max_tokens=500
    )

    return jsonify({
        'resultat': response.choices[0].message.content
    })

if __name__ == '__main__':
    app.run(port=5000, debug=True)