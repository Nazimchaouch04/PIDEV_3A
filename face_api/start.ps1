# BioSync Face ID - Python API Startup Script (PowerShell)
$pythonPath = "C:\Users\hajjo\AppData\Local\Programs\Python\Python312\python.exe"

Write-Host "===========================================" -ForegroundColor Cyan
Write-Host "  BioSync Face ID API - Starting Server" -ForegroundColor Cyan
Write-Host "===========================================" -ForegroundColor Cyan
Write-Host ""

Write-Host "[1/2] Installing Python dependencies..." -ForegroundColor Yellow
& $pythonPath -m pip install fastapi uvicorn python-multipart numpy

Write-Host ""
Write-Host "[2/2] Starting Face API on http://127.0.0.1:8001 ..." -ForegroundColor Green
Write-Host "      Press Ctrl+C to stop"
Write-Host ""

& $pythonPath -m uvicorn main:app --host 127.0.0.1 --port 8001 --reload
