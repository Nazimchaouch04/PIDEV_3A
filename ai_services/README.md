# AI Medical Services

This directory contains Python AI services for the medical application.

## Installation

### Prerequisites
- Python 3.8 or higher
- pip package manager

### Setup

1. **Install Python dependencies:**
```bash
pip install -r requirements.txt
```

2. **Download NLTK data:**
```bash
python -c "import nltk; nltk.download('punkt'); nltk.download('stopwords')"
```

3. **Download spaCy model:**
```bash
python -m spacy download fr_core_news_sm
```

## Services

### 1. Triage System (`triage_system.py`)
Analyzes appointment reasons and assigns urgency levels.

**Usage:**
```bash
python triage_system.py "douleur intense" "patient avec historique cardiaque"
```

**Response:**
```json
{
  "urgency_level": "élevée",
  "priority": 1,
  "recommended_delay": "immédiat / 24h",
  "confidence": 0.8,
  "keywords_found": {
    "high": 1,
    "medium": 0,
    "low": 0
  }
}
```

### 2. Prescription Suggester (`prescription_suggester.py`)
Suggests medications based on symptoms.

**Usage:**
```bash
python prescription_suggester.py "fièvre et toux" "consultation générale"
```

### 3. Consultation Summarizer (`consultation_summarizer.py`)
Generates structured summaries from consultation notes.

**Usage:**
```bash
python consultation_summarizer.py "Patient présente douleur thoracique, fièvre à 38.5°C..."
```

## API Integration

The services are called from Symfony via the `AIController` at:
- `/api/ai/triage` - Triage analysis
- `/api/ai/prescription` - Prescription suggestions  
- `/api/ai/summary` - Consultation summary
- `/api/ai/health` - Health check

## Security Notes

- All services run locally, no external API calls
- Input validation is performed both in Python and Symfony
- Medical data never leaves the local environment
- Prescription suggestions include safety warnings

## Testing

Run tests with:
```bash
python -m pytest tests/
```

## Troubleshooting

1. **Python not found**: Ensure Python 3.8+ is installed and in PATH
2. **Module not found**: Run `pip install -r requirements.txt`
3. **Permission denied**: Check file permissions for Python scripts
4. **Service unavailable**: Check Symfony logs for Python execution errors
