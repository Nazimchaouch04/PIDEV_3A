#!/usr/bin/env python3
import json
import sys
import re
from typing import Dict, List
from utils.nlp_processor import NLPProcessor

class ConsultationSummarizerAI:
    def __init__(self):
        self.nlp = NLPProcessor(language='french')
        self.medical_keywords = {
            'symptoms': ['douleur', 'fièvre', 'toux', 'fatigue', 'nausée', 'vertige', 'maux', 'malaise'],
            'diagnosis': ['diagnostic', 'conclusion', 'syndrome', 'pathologie', 'maladie', 'infection'],
            'treatment': ['traitement', 'médicament', 'ordonnance', 'prescription', 'thérapie'],
            'exams': ['examen', 'analyse', 'radiographie', 'scanner', 'IRM', 'bilan', 'prise de sang'],
            'follow_up': ['suivi', 'contrôle', 'rendez-vous', 'consultation', 'avis']
        }
        
        self.important_patterns = [
            r'pression\s*(artérielle|sanguine)[:\s]*(\d+/\d+)',
            r'température[:\s]*(\d+\.?\d*)°?',
            r'poids[:\s]*(\d+)\s*kg',
            r'taille[:\s]*(\d+)\s*cm'
        ]
    
    def extract_key_info(self, notes: str) -> Dict:
        """Extract structured information from consultation notes using NLP"""
        # Normalize medical text
        normalized_text = self.nlp.normalize_medical_text(notes)
        
        # Extract keywords using NLP
        keywords = self.nlp.extract_keywords(normalized_text)
        
        # Extract vital signs using NLP
        vital_signs = self.nlp.extract_vital_signs(normalized_text)
        
        # Categorize information
        extracted_info = {
            'symptoms': [],
            'diagnosis': [],
            'treatment': [],
            'exams': [],
            'follow_up': [],
            'vital_signs': vital_signs,
            'key_sentences': [],
            'keywords': keywords,
            'text_complexity': self.nlp.assess_text_complexity(normalized_text)
        }
        
        # Enhanced sentence analysis using NLP
        sentences = re.split(r'[.!?]+', normalized_text)
        for sentence in sentences:
            sentence = sentence.strip()
            if not sentence:
                continue
                
            sentence_lower = sentence.lower()
            
            # Categorize sentences using medical keywords
            for category, keywords in self.medical_keywords.items():
                if any(keyword in sentence_lower for keyword in keywords):
                    extracted_info[category].append(sentence)
                    break
            
            # Extract important sentences (longer, more detailed)
            if len(sentence) > 20 and any(word in sentence_lower for word in ['patient', 'présente', 'signale', 'concerne']):
                extracted_info['key_sentences'].append(sentence)
        
        return extracted_info
    
    def generate_summary(self, notes: str) -> Dict:
        """Generate structured summary from consultation notes"""
        extracted = self.extract_key_info(notes)
        
        # Create enhanced summary sections
        summary = {
            'patient_status': self._summarize_status(extracted),
            'main_symptoms': extracted['symptoms'][:3],  # Top 3 symptoms
            'diagnosis': extracted['diagnosis'][:2],    # Top 2 diagnoses
            'treatment_plan': extracted['treatment'][:3],  # Top 3 treatments
            'recommended_exams': extracted['exams'][:2],   # Top 2 exams
            'follow_up_instructions': extracted['follow_up'][:2],  # Top 2 follow-ups
            'vital_signs': extracted['vital_signs'],
            'key_points': extracted['key_sentences'][:3],  # Top 3 key points
            'extracted_keywords': extracted['keywords'][:10],  # Top 10 keywords
            'text_complexity': extracted['text_complexity'],
            'summary_text': self._generate_text_summary(extracted)
        }
        
        return summary
    
    def _summarize_status(self, extracted: Dict) -> str:
        """Generate patient status summary"""
        if extracted['symptoms']:
            return "Patient présente des symptômes nécessitant une attention"
        elif extracted['diagnosis']:
            return "Patient avec diagnostic établi en cours de traitement"
        else:
            return "Consultation de routine / contrôle"
    
    def _generate_text_summary(self, extracted: Dict) -> str:
        """Generate a concise text summary"""
        parts = []
        
        if extracted['symptoms']:
            parts.append(f"Symptômes principaux: {', '.join(extracted['symptoms'][:2])}")
        
        if extracted['diagnosis']:
            parts.append(f"Diagnostic: {extracted['diagnosis'][0]}")
        
        if extracted['treatment']:
            parts.append(f"Traitement: {extracted['treatment'][0]}")
        
        if extracted['follow_up']:
            parts.append(f"Suivi: {extracted['follow_up'][0]}")
        
        return " | ".join(parts) if parts else "Consultation enregistrée"

def main():
    if len(sys.argv) != 2:
        print(json.dumps({"error": "Usage: python consultation_summarizer.py '<consultation_notes>'"}))
        sys.exit(1)
    
    notes = sys.argv[1]
    
    summarizer = ConsultationSummarizerAI()
    result = summarizer.generate_summary(notes)
    
    print(json.dumps(result, ensure_ascii=False, indent=2))

if __name__ == "__main__":
    main()
