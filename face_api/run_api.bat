@echo off
echo ==============================================
echo   BioSync Face ID - Python 3.11 API Startup
echo ==============================================
echo.

echo [1/3] Activating Anaconda Base...
call C:\Users\hajjo\anaconda3\Scripts\activate.bat
call conda activate base
echo.

echo [2/3] Activating biosync_face Environment...
call conda activate biosync_face
echo.

echo Installing core dependencies...
python -m pip install fastapi uvicorn python-multipart numpy

echo Installing pre-compiled AI dependencies...
python -m pip install Pillow face_recognition_models dlib-bin

echo Installing face_recognition (bypassing compilation)...
python -m pip install face_recognition --no-deps
echo.

echo [3/3] Starting Face API on http://127.0.0.1:8001 ...
python -m uvicorn main:app --host 127.0.0.1 --port 8001 --reload
