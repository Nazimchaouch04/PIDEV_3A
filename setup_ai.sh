#!/bin/bash

echo "🤖 Setting up AI Medical Services..."

# Check Python version
python_version=$(python3 --version 2>&1 | awk '{print $2}')
echo "Python version: $python_version"

# Install requirements
echo "📦 Installing Python dependencies..."
pip3 install -r requirements.txt

# Download NLTK data
echo "📚 Downloading NLTK data..."
python3 -c "import nltk; nltk.download('punkt'); nltk.download('stopwords')"

# Download spaCy model
echo "🧠 Downloading spaCy French model..."
python3 -m spacy download fr_core_news_sm

# Test services
echo "🧪 Testing AI services..."
python3 ai_services/triage_system.py "test" "test"

echo "✅ AI Services setup complete!"
echo "Run 'python3 ai_services/triage_system.py \"douleur\" \"test\"' to test"
