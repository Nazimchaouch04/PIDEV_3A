#!/usr/bin/env python3
import json
import sys
from typing import Dict, List
from utils.nlp_processor import NLPProcessor

class PrescriptionAI:
    def __init__(self):
        self.nlp = NLPProcessor(language='french')
        self.medications_db = {
            'douleur': [
                {'name': 'Paracétamol', 'dosage': '500mg', 'frequency': '3x/jour'},
                {'name': 'Ibuprofène', 'dosage': '400mg', 'frequency': '3x/jour', 'precautions': 'avec alimentation'},
                {'name': 'Aspirine', 'dosage': '500mg', 'frequency': '2-3x/jour'}
            ],
            'fièvre': [
                {'name': 'Paracétamol', 'dosage': '500-1000mg', 'frequency': '4x/jour max'},
                {'name': 'Ibuprofène', 'dosage': '200-400mg', 'frequency': '3-4x/jour'}
            ],
            'toux': [
                {'name': 'Dextrométhorphane', 'dosage': '10-20mg', 'frequency': '3-4x/jour'},
                {'name': 'Guaifénésine', 'dosage': '200-400mg', 'frequency': '4x/jour'},
                {'name': 'Ambroxol', 'dosage': '30mg', 'frequency': '3x/jour'}
            ],
            'infection': [
                {'name': 'Amoxicilline', 'dosage': '500mg', 'frequency': '3x/jour', 'duration': '7 jours'},
                {'name': 'Azithromycine', 'dosage': '250mg', 'frequency': '1x/jour', 'duration': '3 jours'}
            ],
            'anxiété': [
                {'name': 'Alprazolam', 'dosage': '0.25mg', 'frequency': '2-3x/jour', 'controlled': True},
                {'name': 'Sertraline', 'dosage': '50mg', 'frequency': '1x/jour matin'},
                {'name': 'Hydroxyzine', 'dosage': '25mg', 'frequency': '3-4x/jour'}
            ],
            'insomnie': [
                {'name': 'Zolpidem', 'dosage': '10mg', 'frequency': '1x/jour soir', 'controlled': True},
                {'name': 'Mélatonine', 'dosage': '3-5mg', 'frequency': '1x/jour soir'},
                {'name': 'Zopiclone', 'dosage': '7.5mg', 'frequency': '1x/jour soir'}
            ]
        }
        
        self.symptom_keywords = {
            'douleur': ['douleur', 'mal', 'souffrance', 'céphalée', 'migraine', 'arthralgie'],
            'fièvre': ['fièvre', 'température', 'chaud', 'frissons', 'pyrexie'],
            'toux': ['toux', 'tousse', 'expectoration', 'bronchite', 'irritation gorge'],
            'infection': ['infection', 'bactérie', 'virus', 'inflammation', 'pus', 'rougeur'],
            'anxiété': ['anxiété', 'stress', 'anxiété', 'panique', 'angoisse', 'nerveux'],
            'insomnie': ['insomnie', 'difficulté dormir', 'réveil nocturne', 'sommeil', 'fatigue']
        }
    
    def suggest_medications(self, symptoms: str, consultation_reason: str = "") -> Dict:
        """Suggest medications based on symptoms"""
        # Use NLP processor for better text analysis
        combined_text = f"{symptoms} {consultation_reason}"
        
        # Extract keywords using NLP
        keywords = self.nlp.extract_keywords(combined_text)
        
        # Extract vital signs for context
        vital_signs = self.nlp.extract_vital_signs(combined_text)
        
        # Find matching symptom categories using enhanced analysis
        matched_categories = []
        keyword_matches = {}
        
        for category, keywords in self.symptom_keywords.items():
            matches = 0
            for keyword in keywords:
                # Check both original keywords and extracted keywords
                if keyword in combined_text.lower() or any(keyword in kw for kw in keywords):
                    matches += 1
            if matches > 0:
                matched_categories.append(category)
                keyword_matches[category] = matches
        
        # Generate suggestions with enhanced context
        suggestions = []
        for category in matched_categories:
            if category in self.medications_db:
                for med in self.medications_db[category]:
                    medication = {
                        'category': category,
                        'name': med['name'],
                        'dosage': med['dosage'],
                        'frequency': med['frequency'],
                        'duration': med.get('duration', 'selon prescription'),
                        'precautions': med.get('precautions', ''),
                        'controlled': med.get('controlled', False),
                        'match_strength': keyword_matches.get(category, 0)
                    }
                    
                    # Add vital signs context to recommendations
                    if vital_signs:
                        if 'température' in vital_signs and float(vital_signs['température'].replace('°C', '')) > 38.5:
                            medication['precautions'] += ' - Fièvre élevée détectée'
                    
                    suggestions.append(medication)
        
        # Sort by match strength and remove duplicates
        unique_suggestions = []
        seen = set()
        for suggestion in sorted(suggestions, key=lambda x: x['match_strength'], reverse=True):
            key = suggestion['name']
            if key not in seen:
                seen.add(key)
                unique_suggestions.append(suggestion)
        
        return {
            "symptoms_analyzed": symptoms,
            "extracted_keywords": keywords,
            "vital_signs": vital_signs,
            "matched_categories": matched_categories,
            "keyword_matches": keyword_matches,
            "suggestions": unique_suggestions[:5],  # Limit to top 5
            "confidence": len(matched_categories) / len(self.symptom_keywords),
            "disclaimer": "Ces suggestions sont informatives. La prescription finale doit être faite par un médecin."
        }

def main():
    if len(sys.argv) != 3:
        print(json.dumps({"error": "Usage: python prescription_suggester.py '<symptoms>' '<consultation_reason>'"}))
        sys.exit(1)
    
    symptoms = sys.argv[1]
    consultation_reason = sys.argv[2]
    
    ai = PrescriptionAI()
    result = ai.suggest_medications(symptoms, consultation_reason)
    
    print(json.dumps(result, ensure_ascii=False, indent=2))

if __name__ == "__main__":
    main()
