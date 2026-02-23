#!/usr/bin/env python3
import json
import sys
from typing import Dict, List
from utils.nlp_processor import NLPProcessor

class MedicalTriageAI:
    def __init__(self):
        self.nlp = NLPProcessor(language='french')
        self.urgency_keywords = {
            'high': [
                'urgence', 'douleur intense', 'saignement', 'difficulté respiratoire',
                'poitrine', 'fièvre élevée', 'perte conscience', 'accident',
                'chute', 'blessure grave', 'crise cardiaque', 'AVC', 'infection sévère'
            ],
            'medium': [
                'douleur', 'fièvre', 'toux', 'maux de tête', 'fatigue',
                'nausée', 'vomissement', 'diarrhée', 'éruption', 'gonflement',
                'vertige', 'perte poids', 'insomnie', 'anxiété'
            ],
            'low': [
                'contrôle', 'suivi', 'renouvellement ordonnance', 'check-up',
                'vaccination', 'conseil', 'examen de routine', 'bilan',
                'certificat médical', 'avis', 'consultation préventive'
            ]
        }
    
    def analyze_urgency(self, reason: str, patient_history: str = "") -> Dict:
        """Analyze appointment reason and assign urgency level using enhanced NLP"""
        # Normalize and combine text
        combined_text = f"{reason} {patient_history}"
        normalized_text = self.nlp.normalize_medical_text(combined_text)
        
        # Extract keywords using NLP
        keywords = self.nlp.extract_keywords(normalized_text)
        
        # Extract vital signs for context
        vital_signs = self.nlp.extract_vital_signs(normalized_text)
        
        # Enhanced keyword analysis
        reason_lower = normalized_text.lower()
        history_lower = patient_history.lower()
        
        # Count keyword matches with NLP enhancement
        high_score = sum(1 for keyword in self.urgency_keywords['high'] 
                        if keyword in reason_lower or keyword in history_lower)
        medium_score = sum(1 for keyword in self.urgency_keywords['medium'] 
                          if keyword in reason_lower or keyword in history_lower)
        low_score = sum(1 for keyword in self.urgency_keywords['low'] 
                       if keyword in reason_lower or keyword in history_lower)
        
        # Determine urgency level with vital signs context
        if high_score > 0 or self._has_critical_vital_signs(vital_signs):
            urgency = "élevée"
            priority = 1
            recommended_delay = "immédiat / 24h"
        elif medium_score > 1 or (medium_score > 0 and vital_signs):
            urgency = "moyenne"
            priority = 2
            recommended_delay = "48-72h"
        else:
            urgency = "faible"
            priority = 3
            recommended_delay = "1-2 semaines"
        
        return {
            "urgency_level": urgency,
            "priority": priority,
            "recommended_delay": recommended_delay,
            "confidence": max(high_score, medium_score, low_score) / 3,
            "keywords_found": {
                "high": high_score,
                "medium": medium_score,
                "low": low_score
            },
            "extracted_keywords": keywords,
            "vital_signs": vital_signs,
            "text_complexity": self.nlp.assess_text_complexity(normalized_text)
        }
    
    def _has_critical_vital_signs(self, vital_signs: Dict) -> bool:
        """Check for critical vital signs"""
        if not vital_signs:
            return False
        
        # Check for critical temperature
        if 'température' in vital_signs:
            temp = float(vital_signs['température'].replace('°C', ''))
            if temp > 39.5 or temp < 35.0:
                return True
        
        # Check for critical blood pressure
        if 'tension_artérielle' in vital_signs:
            bp = vital_signs['tension_artérielle'].split('/')[0]
            systolic = int(bp)
            if systolic > 180 or systolic < 90:
                return True
        
        return False

def main():
    if len(sys.argv) != 3:
        print(json.dumps({"error": "Usage: python triage_system.py '<reason>' '<history>'"}))
        sys.exit(1)
    
    reason = sys.argv[1]
    history = sys.argv[2]
    
    triage = MedicalTriageAI()
    result = triage.analyze_urgency(reason, history)
    
    print(json.dumps(result, ensure_ascii=False, indent=2))

if __name__ == "__main__":
    main()
