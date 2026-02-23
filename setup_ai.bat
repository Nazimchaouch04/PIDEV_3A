@echo off
echo  Setting up AI Medical Services...

REM Check Python version
python --version
if %errorlevel% neq 0 (
    echo  Python not found. Please install Python 3.8+ first.
    pause
    exit /b 1
)

REM Install requirements
echo  Installing Python dependencies...
pip install -r requirements.txt
if %errorlevel% neq 0 (
    echo  Failed to install requirements
    pause
    exit /b 1
)

REM Download NLTK data
echo  Downloading NLTK data...
python -c "import nltk; nltk.download('punkt'); nltk.download('stopwords')"
if %errorlevel% neq 0 (
    echo  Failed to download NLTK data
    pause
    exit /b 1
)

REM Download spaCy model
echo  Downloading spaCy French model...
python -m spacy download fr_core_news_sm
if %errorlevel% neq 0 (
    echo  Failed to download spaCy model
    pause
    exit /b 1
)

REM Test services
echo  Testing AI services...
python ai_services\triage_system.py "test" "test"
if %errorlevel% neq 0 (
    echo  AI services test failed
    pause
    exit /b 1
)

echo  AI Services setup complete!
echo Run 'python ai_services\triage_system.py "douleur" "test"' to test
pause
