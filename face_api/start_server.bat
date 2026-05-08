@echo off
echo Starting Face API on port 8003...
C:\Users\salma\anaconda3\python.exe -m uvicorn main_simple:app --host 127.0.0.1 --port 8003
pause
