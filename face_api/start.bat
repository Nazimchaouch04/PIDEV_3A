@echo off
echo ==========================================
echo   BioSync Face ID - Python API Startup
echo ==========================================
echo.
echo Installing Python dependencies...
pip install -r requirements.txt
echo.
echo Starting the Face Recognition API on port 8001...
echo Visit http://127.0.0.1:8001 to check status
echo.
uvicorn main:app --host 127.0.0.1 --port 8001 --reload
