"""
predict.py
Appelé par Symfony via shell_exec()
Supporte 2 modes :
  python ml/predict.py --file /tmp/data.json   (Windows - recommandé)
  python ml/predict.py '{"age":25,...}'          (Linux/Mac)
"""

import sys
import json
import pickle
import os
import numpy as np

def main():
    # -------------------------------------------------------
    # 1. Lire les données
    # -------------------------------------------------------
    if len(sys.argv) < 2:
        print(json.dumps({'status': 'error', 'message': 'Aucune donnée reçue'}))
        sys.exit(1)

    try:
        if sys.argv[1] == '--file' and len(sys.argv) >= 3:
            # Mode fichier temporaire (Windows)
            with open(sys.argv[2], 'r', encoding='utf-8') as f:
                data = json.load(f)
        else:
            # Mode argument direct (Linux/Mac)
            data = json.loads(sys.argv[1])
    except (json.JSONDecodeError, FileNotFoundError) as e:
        print(json.dumps({'status': 'error', 'message': f'Erreur lecture: {str(e)}'}))
        sys.exit(1)

    # -------------------------------------------------------
    # 2. Valider les champs requis
    # -------------------------------------------------------
    required = ['age', 'poids', 'intensite', 'duree', 'calorie_par_minute']
    for field in required:
        if field not in data:
            print(json.dumps({'status': 'error', 'message': f'Champ manquant: {field}'}))
            sys.exit(1)

    # -------------------------------------------------------
    # 3. Charger le modèle
    # -------------------------------------------------------
    model_path = os.path.join(os.path.dirname(__file__), 'model.pkl')
    if not os.path.exists(model_path):
        print(json.dumps({'status': 'error', 'message': 'model.pkl introuvable. Lance train_model.py'}))
        sys.exit(1)

    with open(model_path, 'rb') as f:
        saved = pickle.load(f)
    model = saved['model']

    # -------------------------------------------------------
    # 4. Encoder intensite
    # -------------------------------------------------------
    intensite_map    = {'FAIBLE': 1, 'MODEREE': 2, 'ELEVEE': 3}
    intensite_encode = intensite_map.get(data['intensite'].upper(), 2)

    # -------------------------------------------------------
    # 5. Prédire
    # -------------------------------------------------------
    features = np.array([[
        float(data['age']),
        float(data['poids']),
        float(intensite_encode),
        float(data['duree']),
        float(data['calorie_par_minute'])
    ]])

    import warnings
    with warnings.catch_warnings():
        warnings.simplefilter("ignore")
        calories = model.predict(features)[0]

    # -------------------------------------------------------
    # 6. Message personnalisé
    # -------------------------------------------------------
    messages = {
        'FAIBLE':  'Séance légère — bonne pour la récupération 💚',
        'MODEREE': 'Séance modérée — excellent équilibre effort/récupération 🟡',
        'ELEVEE':  'Séance intense — maximum de résultats 🔥'
    }
    message = messages.get(data['intensite'].upper(), '')

    # -------------------------------------------------------
    # 7. Retourner le résultat
    # -------------------------------------------------------
    print(json.dumps({
        'status':            'success',
        'calories_predites': round(float(calories), 1),
        'intensite':         data['intensite'].upper(),
        'duree':             data['duree'],
        'message':           message
    }))

if __name__ == '__main__':
    main()