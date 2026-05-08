"""
train_model.py
Entraîne un modèle Random Forest sur les données BioSync
Input  : age, poids, intensite, duree, calorie_par_minute
Output : calories_totales prédites
"""

import pandas as pd
import numpy as np
import pickle
import os
from sklearn.ensemble import RandomForestRegressor
from sklearn.model_selection import train_test_split
from sklearn.metrics import mean_absolute_error, r2_score

# -------------------------------------------------------
# 1. Charger les données
# -------------------------------------------------------
csv_path = os.path.join(os.path.dirname(__file__), 'dataset.csv')

if not os.path.exists(csv_path):
    print("❌ dataset.csv introuvable. Lance d'abord : python ml/generate_data.py")
    exit(1)

df = pd.read_csv(csv_path)
print(f"✅ Données chargées : {len(df)} exemples")

# -------------------------------------------------------
# 2. Préparer les features
# -------------------------------------------------------
# Encoder intensite si pas déjà encodé
if 'intensite_encode' not in df.columns:
    mapping = {'FAIBLE': 1, 'MODEREE': 2, 'ELEVEE': 3}
    df['intensite_encode'] = df['intensite'].map(mapping).fillna(1)

# Features utilisées pour la prédiction
FEATURES = ['age', 'poids', 'intensite_encode', 'duree_minutes', 'calorie_par_minute']
TARGET   = 'calories_totales'

X = df[FEATURES]
y = df[TARGET]

print(f"📊 Features : {FEATURES}")
print(f"🎯 Target   : {TARGET}")

# -------------------------------------------------------
# 3. Split train / test
# -------------------------------------------------------
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42
)
print(f"\n🔀 Train : {len(X_train)} | Test : {len(X_test)}")

# -------------------------------------------------------
# 4. Entraîner le modèle
# -------------------------------------------------------
model = RandomForestRegressor(
    n_estimators=100,
    max_depth=10,
    min_samples_split=5,
    random_state=42,
    n_jobs=-1
)

print("\n⏳ Entraînement en cours...")
model.fit(X_train, y_train)
print("✅ Entraînement terminé !")

# -------------------------------------------------------
# 5. Évaluer le modèle
# -------------------------------------------------------
y_pred = model.predict(X_test)
mae    = mean_absolute_error(y_test, y_pred)
r2     = r2_score(y_test, y_pred)

print(f"\n📈 Performance du modèle :")
print(f"   MAE (erreur moyenne) : ±{mae:.1f} kcal")
print(f"   R² Score             : {r2:.3f} (1.0 = parfait)")

# Importance des features
print(f"\n🔍 Importance des variables :")
for feat, imp in sorted(zip(FEATURES, model.feature_importances_), key=lambda x: -x[1]):
    bar = "█" * int(imp * 40)
    print(f"   {feat:<25} {bar} {imp:.3f}")

# -------------------------------------------------------
# 6. Sauvegarder le modèle
# -------------------------------------------------------
model_path = os.path.join(os.path.dirname(__file__), 'model.pkl')
with open(model_path, 'wb') as f:
    pickle.dump({
        'model':    model,
        'features': FEATURES
    }, f)

print(f"\n💾 Modèle sauvegardé : {model_path}")
print("🚀 Prêt à être utilisé par Symfony !")
