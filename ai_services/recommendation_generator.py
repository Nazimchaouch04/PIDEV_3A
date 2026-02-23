#!/usr/bin/env python3
"""
AI Recommendation Generator for Medical Consultations
Generates personalized recommendations based on symptoms and diagnosis
"""

import sys
import json
import re
from typing import List, Dict, Any

class RecommendationGenerator:
    def __init__(self):
        self.medical_recommendations = {
            'headache': [
                'Reposer dans un endroit calme et sombre',
                'Appliquer une compresse froide sur le front',
                'Hydrater régulièrement avec de l\'eau',
                'Éviter les écrans et la lumière vive',
                'Consulter si les maux de tête persistent plus de 3 jours'
            ],
            'fever': [
                'Reposer et éviter les activités physiques intenses',
                'Boire beaucoup de liquides (eau, tisanes)',
                'Prendre des douches tièdes pour faire baisser la température',
                'Surveiller la température toutes les 4 heures',
                'Consulter si la fièvre dépasse 39°C ou persiste plus de 48h'
            ],
            'cough': [
                'Boire des liquides chauds (tisanes, miel)',
                'Utiliser un humidificateur d\'air',
                'Éviter les irritants (fumée, parfums forts)',
                'Dormir avec la tête surélevée',
                'Consulter si la toux dure plus de 2 semaines'
            ],
            'fatigue': [
                'Assurer 7-9 heures de sommeil par nuit',
                'Faire des pauses régulières dans la journée',
                'Pratiquer une activité physique modérée',
                'Maintenir une alimentation équilibrée',
                'Consulter si la fatigue persiste plus de 6 semaines'
            ],
            'stress': [
                'Pratiquer des techniques de relaxation (respiration, méditation)',
                'Faire de l\'exercice physique régulièrement',
                'Maintenir un bon équilibre vie pro/vie perso',
                'Dormir suffisamment (7-8 heures)',
                'Consulter un professionnel si le stress devient chronique'
            ],
            'digestive': [
                'Manger lentement et bien mâcher',
                'Éviter les aliments trop gras ou épicés',
                'Boire entre les repas plutôt que pendant',
                'Pratiquer une activité physique douce après les repas',
                'Consulter si les troubles digestifs persistent'
            ],
            'pain': [
                'Appliquer du chaud ou du froid selon le type de douleur',
                'Faire des étirements doux si douleur musculaire',
                'Maintenir une bonne posture',
                'Éviter les mouvements brusques',
                'Consulter si la douleur est intense ou persiste'
            ]
        }
        
        self.lifestyle_recommendations = [
            'Maintenir une alimentation équilibrée et variée',
            'Boire au moins 1.5L d\'eau par jour',
            'Dormir 7-9 heures par nuit',
            'Faire 30 minutes d\'activité physique par jour',
            'Gérer le stress par des techniques de relaxation',
            'Éviter le tabac et limiter l\'alcool',
            'Maintenir un poids santé',
            'Faire des examens de prévention réguliers'
        ]

    def extract_keywords(self, text: str) -> List[str]:
        """Extract medical keywords from symptoms and diagnosis"""
        keywords = []
        text_lower = text.lower()
        
        # Common medical terms mapping
        medical_terms = {
            'headache': ['mal de tête', 'céphalée', 'migraine', 'douleur tête'],
            'fever': ['fièvre', 'température', 'fébrile', 'chaleur'],
            'cough': ['toux', 'toux sèche', 'toux grasse', 'expectoration'],
            'fatigue': ['fatigue', 'épuisement', 'fatigué', 'faiblesse'],
            'stress': ['stress', 'anxiété', 'anxieux', 'tendu', 'nervosité'],
            'digestive': ['digestion', 'estomac', 'ventre', 'ballonnement', 'nausée'],
            'pain': ['douleur', 'mal', 'souffrance', 'gêne', 'articulation'],
            'sleep': ['sommeil', 'insomnie', 'dormir', 'réveil'],
            'breathing': ['respiration', 'essoufflé', 'souffle', 'respirer'],
            'heart': ['cœur', 'cardiaque', 'palpitation', 'rythme']
        }
        
        for category, terms in medical_terms.items():
            for term in terms:
                if term in text_lower:
                    keywords.append(category)
                    break
        
        return list(set(keywords))

    def generate_recommendations(self, symptoms: str, diagnosis: str) -> Dict[str, Any]:
        """Generate personalized recommendations based on symptoms and diagnosis"""
        
        # Extract keywords from both symptoms and diagnosis
        symptom_keywords = self.extract_keywords(symptoms)
        diagnosis_keywords = self.extract_keywords(diagnosis)
        all_keywords = list(set(symptom_keywords + diagnosis_keywords))
        
        recommendations = []
        
        # Add specific recommendations based on keywords
        for keyword in all_keywords:
            if keyword in self.medical_recommendations:
                recommendations.extend(self.medical_recommendations[keyword])
        
        # Add general lifestyle recommendations
        recommendations.extend(self.lifestyle_recommendations[:3])  # Top 3 lifestyle recommendations
        
        # Remove duplicates while preserving order
        seen = set()
        unique_recommendations = []
        for rec in recommendations:
            if rec not in seen:
                seen.add(rec)
                unique_recommendations.append(rec)
        
        # Limit to 8 recommendations maximum
        final_recommendations = unique_recommendations[:8]
        
        return {
            'recommandations': final_recommendations,
            'keywords_found': all_keywords,
            'personalized': len(all_keywords) > 0,
            'evidence_level': 'moderate',
            'total_recommendations': len(final_recommendations)
        }

def main():
    if len(sys.argv) != 3:
        print(json.dumps({
            'error': 'Usage: python recommendation_generator.py "<symptoms>" "<diagnosis>"'
        }))
        sys.exit(1)
    
    symptoms = sys.argv[1]
    diagnosis = sys.argv[2]
    
    try:
        generator = RecommendationGenerator()
        result = generator.generate_recommendations(symptoms, diagnosis)
        print(json.dumps(result, ensure_ascii=False, indent=2))
    except Exception as e:
        print(json.dumps({
            'error': f'Recommendation generation failed: {str(e)}'
        }))
        sys.exit(1)

if __name__ == "__main__":
    main()
