# Démarrage forcé sans Conda Solve
import os
import subprocess
import sys

print("Installing dependencies...")
subprocess.check_call([sys.executable, "-m", "pip", "install", "--upgrade", "pip"])
subprocess.check_call([sys.executable, "-m", "pip", "install", "fastapi", "uvicorn", "python-multipart", "numpy", "dlib-bin", "face_recognition"])

print("\nStarting Face API on port 8001...")
os.system(f'"{sys.executable}" -m uvicorn main:app --host 127.0.0.1 --port 8001 --reload')
