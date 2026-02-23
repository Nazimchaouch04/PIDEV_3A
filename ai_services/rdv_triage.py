#!/usr/bin/env python3
"""
RDV Triage System - Alternative implementation of triage_system.py

This module provides appointment triage functionality for medical appointments.
Analyzes appointment reasons and assigns urgency levels.
"""

import json
import sys
from typing import Dict, List
from utils.nlp_processor import NLPProcessor

class RDVTriageAI:
    """AI-powered appointment triage system"""
    
    def __init__(self):
        self.nlp = NLPProcessor(language='french')
        
        # Enhanced urgency keywords with medical context
        self.urgency_keywords = {
            'critical': [
                'arrêt cardiaque', 'inconscience', 'hémorragie', 'saignement abondant',
                'détresse respiratoire', 'difficulté respiratoire sévère', 'anaphylaxie',
                'overdose', 'intoxication sévère', 'traumatisme grave', 'polytraumatisme',
                'accident vasculaire cérébral', 'AVC', 'infarctus', 'crise cardiaque'
            ],
            'high': [
                'douleur intense', 'douleur thoracique', 'douleur poitrine',
                'fièvre élevée', 'fièvre supérieure', 'température supérieure',
                'saignement', 'blessure grave', 'fracture', 'brûlure étendue',
                'perte connaissance', 'évanouissement', 'vertige sévère',
                'infection sévère', 'septicémie', 'choc', 'urgence'
            ],
            'medium': [
                'douleur', 'fièvre', 'toux persistante', 'difficulté respiratoire',
                'nausée', 'vomissement', 'diarrhée', 'déshydratation',
                'éruption cutanée', 'gonflement', 'infection', 'inflammation',
                'vertige', 'malaise', 'fatigue sévère', 'perte poids'
            ],
            'low': [
                'contrôle', 'suivi', 'renouvellement', 'ordonnance',
                'check-up', 'bilan', 'examen routine', 'vaccination',
                'certificat', 'avis', 'conseil', 'consultation préventive',
                'résultat analyse', 'compte rendu', 'information'
            ]
        }
        
        # Urgency scores
        self.urgency_scores = {
            'critical': 4,
            'high': 3,
            'medium': 2,
            'low': 1
        }
        
        # Recommended delays (in hours/days)
        self.recommended_delays = {
            'critical': 'immédiat - appeler les urgences',
            'high': 'moins de 24 heures',
            'medium': '48-72 heures',
            'low': '1-2 semaines'
        }
    
    def analyze_text_urgency(self, text: str) -> Dict[str, int]:
        """Analyze urgency keywords in text"""
        text_lower = text.lower()
        keyword_counts = {}
        
        for urgency_level, keywords in self.urgency_keywords.items():
            count = 0
            for keyword in keywords:
                if keyword in text_lower:
                    count += 1
            keyword_counts[urgency_level] = count
        
        return keyword_counts
    
    def calculate_urgency_score(self, keyword_counts: Dict[str, int]) -> Dict:
        """Calculate final urgency score and level"""
        total_score = 0
        max_level = 'low'
        max_count = 0
        
        for level, count in keyword_counts.items():
            if count > 0:
                score = count * self.urgency_scores[level]
                total_score += score
                
                # Track highest urgency level found
                if count > max_count or (count == max_count and self.urgency_scores[level] > self.urgency_scores[max_level]):
                    max_count = count
                    max_level = level
        
        # Determine final urgency level
        if keyword_counts['critical'] > 0:
            final_level = 'critical'
        elif keyword_counts['high'] > 0:
            final_level = 'high'
        elif keyword_counts['medium'] > 1:  # Multiple medium symptoms
            final_level = 'high'
        elif keyword_counts['medium'] > 0:
            final_level = 'medium'
        else:
            final_level = 'low'
        
        return {
            'final_level': final_level,
            'score': total_score,
            'keyword_counts': keyword_counts,
            'confidence': min(total_score / 10, 1.0)  # Normalize to 0-1
        }
    
    def extract_medical_context(self, reason: str, history: str = "") -> Dict:
        """Extract medical context using NLP"""
        combined_text = f"{reason} {history}"
        
        # Extract keywords
        keywords = self.nlp.extract_keywords(combined_text)
        
        # Extract vital signs
        vital_signs = self.nlp.extract_vital_signs(combined_text)
        
        # Assess text complexity
        complexity = self.nlp.assess_text_complexity(combined_text)
        
        return {
            'keywords': keywords,
            'vital_signs': vital_signs,
            'complexity': complexity
        }
    
    def triage_appointment(self, reason: str, patient_history: str = "") -> Dict:
        """Main triage function for appointment"""
        # Analyze urgency keywords
        keyword_analysis = self.analyze_text_urgency(f"{reason} {patient_history}")
        
        # Calculate urgency score
        urgency_result = self.calculate_urgency_score(keyword_analysis)
        
        # Extract medical context
        medical_context = self.extract_medical_context(reason, patient_history)
        
        # Get recommended delay
        recommended_delay = self.recommended_delays[urgency_result['final_level']]
        
        # Generate priority level (1-4, where 1 is highest priority)
        priority = {
            'critical': 1,
            'high': 1,
            'medium': 2,
            'low': 3
        }[urgency_result['final_level']]
        
        return {
            'urgency_level': urgency_result['final_level'],
            'urgency_level_fr': {
                'critical': 'critique',
                'high': 'élevée',
                'medium': 'moyenne',
                'low': 'faible'
            }[urgency_result['final_level']],
            'priority': priority,
            'score': urgency_result['score'],
            'confidence': urgency_result['confidence'],
            'recommended_delay': recommended_delay,
            'keywords_found': urgency_result['keyword_counts'],
            'medical_context': medical_context,
            'recommendations': self._generate_recommendations(urgency_result['final_level'], medical_context)
        }
    
    def _generate_recommendations(self, urgency_level: str, context: Dict) -> List[str]:
        """Generate recommendations based on urgency level and context"""
        recommendations = []
        
        if urgency_level == 'critical':
            recommendations.extend([
                "Appeler immédiatement les services d'urgence (15, 112, 18)",
                "Ne pas déplacer le patient si non nécessaire",
                "Surveiller les signes vitaux en continu"
            ])
        elif urgency_level == 'high':
            recommendations.extend([
                "Consulter dans les 24 heures",
                "Surveiller l'évolution des symptômes",
                "Contacter le médecin traitant en urgence"
            ])
        elif urgency_level == 'medium':
            recommendations.extend([
                "Prendre rendez-vous dans les 48-72 heures",
                "Surveiller la température et autres symptômes",
                "Reposer et s'hydrater"
            ])
        else:
            recommendations.extend([
                "Consultation de routine prévue",
                "Pas d'urgence médicale détectée",
                "Maintenir le suivi régulier"
            ])
        
        # Add context-specific recommendations
        if context.get('vital_signs'):
            recommendations.append("Signes vitaux anormaux détectés - surveillance renforcée")
        
        return recommendations

def main():
    """Main function for command line usage"""
    if len(sys.argv) != 3:
        print(json.dumps({
            "error": "Usage: python rdv_triage.py '<reason>' '<patient_history>'"
        }))
        sys.exit(1)
    
    reason = sys.argv[1]
    patient_history = sys.argv[2]
    
    # Initialize triage system
    triage = RDVTriageAI()
    
    # Perform triage analysis
    result = triage.triage_appointment(reason, patient_history)
    
    # Output result as JSON
    print(json.dumps(result, ensure_ascii=False, indent=2))

if __name__ == "__main__":
    main()
