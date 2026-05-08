"""
generate_data.py
Génère 500 données synthétiques réalistes basées sur les vrais champs de BioSync :
- Exercice : nom, intensite (FAIBLE/MODEREE/ELEVEE), calorie_par_minute
- Profil Santé : age, poids
"""

import pandas as pd
import numpy as np

np.random.seed(42)
n = 500

# --- Données profil santé ---
ages   = np.random.randint(16, 65, n)
poids  = np.random.randint(45, 130, n)

# --- Exercices disponibles dans BioSync ---
exercices = [
    'pompes', 'squats', 'abdos', 'burpees', 'fentes',
    'tractions', 'course', 'velo', 'natation', 'musculation',
    'yoga', 'danse'
]
noms = np.random.choice(exercices, n)

# --- Intensité : FAIBLE=1, MODEREE=2, ELEVEE=3 ---
intensites_label = np.random.choice(['FAIBLE', 'MODEREE', 'ELEVEE'], n, p=[0.3, 0.4, 0.3])
intensite_encode = {'FAIBLE': 1, 'MODEREE': 2, 'ELEVEE': 3}
intensites_num   = np.array([intensite_encode[i] for i in intensites_label])

# --- Durée en minutes (pas dans le form mais nécessaire pour prédiction) ---
durees = np.random.randint(10, 90, n)

# --- Calories par minute réalistes selon intensité ---
calorie_base = {
    'FAIBLE':  np.random.uniform(3.0, 5.0, n),
    'MODEREE': np.random.uniform(5.0, 8.0, n),
    'ELEVEE':  np.random.uniform(8.0, 12.0, n),
}
calories_par_minute = np.where(
    intensites_label == 'FAIBLE',  calorie_base['FAIBLE'],
    np.where(
        intensites_label == 'MODEREE', calorie_base['MODEREE'],
        calorie_base['ELEVEE']
    )
)

# --- Calories TOTALES brûlées (ce qu'on veut prédire) ---
# Formule : calorie/min * durée + facteur poids + facteur age + bruit
calories_totales = (
    calories_par_minute * durees
    + poids * 0.05
    - ages  * 0.1
    + np.random.normal(0, 20, n)
).clip(30, 1500).round(2)

# --- Construction du DataFrame ---
df = pd.DataFrame({
    'age':               ages,
    'poids':             poids,
    'nom_exercice':      noms,
    'intensite':         intensites_label,
    'intensite_encode':  intensites_num,
    'duree_minutes':     durees,
    'calorie_par_minute': calories_par_minute.round(2),
    'calories_totales':  calories_totales
})

df.to_csv('ml/dataset.csv', index=False)

print(f"✅ {n} exemples générés dans ml/dataset.csv")
print(f"\n📊 Aperçu des données :")
print(df.head(5).to_string())
print(f"\n📈 Statistiques calories totales :")
print(f"   Min : {df['calories_totales'].min():.0f} kcal")
print(f"   Max : {df['calories_totales'].max():.0f} kcal")
print(f"   Moy : {df['calories_totales'].mean():.0f} kcal")
