"""
NLP Processor - Shared Natural Language Processing Utilities

This module provides common text processing functions used across AI medical services.
Includes text cleaning, tokenization, keyword extraction, and medical term processing.
"""

import re
import string
from typing import List, Dict, Set
import nltk
from nltk.corpus import stopwords
from nltk.tokenize import word_tokenize
from nltk.stem import SnowballStemmer

# Download required NLTK data (only once)
try:
    nltk.data.find('tokenizers/punkt')
    nltk.data.find('corpora/stopwords')
except LookupError:
    nltk.download('punkt')
    nltk.download('stopwords')

class NLPProcessor:
    """Shared NLP processing utilities for medical AI services"""
    
    def __init__(self, language='french'):
        self.language = language
        self.stop_words = set(stopwords.words(language))
        self.stemmer = SnowballStemmer(language)
        
        # Medical-specific stop words (common but not medically significant)
        self.medical_stop_words = {
            'patient', 'docteur', 'médecin', 'monsieur', 'madame', 'mr', 'mme',
            'année', 'ans', 'jour', 'semaine', 'mois', 'heure', 'minutes',
            'cas', 'situation', 'état', 'condition', 'problème', 'souhait'
        }
        self.stop_words.update(self.medical_stop_words)
    
    def clean_text(self, text: str) -> str:
        """Clean and normalize text"""
        if not text:
            return ""
        
        # Convert to lowercase
        text = text.lower()
        
        # Remove punctuation
        text = text.translate(str.maketrans('', '', string.punctuation))
        
        # Remove numbers (optional, keep if medically relevant)
        text = re.sub(r'\d+', '', text)
        
        # Remove extra whitespace
        text = ' '.join(text.split())
        
        return text.strip()
    
    def tokenize(self, text: str) -> List[str]:
        """Tokenize text into words"""
        if not text:
            return []
        
        # Clean first
        cleaned_text = self.clean_text(text)
        
        # Tokenize
        tokens = word_tokenize(cleaned_text, language=self.language)
        
        return tokens
    
    def remove_stop_words(self, tokens: List[str]) -> List[str]:
        """Remove stop words from token list"""
        return [token for token in tokens if token not in self.stop_words]
    
    def stem_tokens(self, tokens: List[str]) -> List[str]:
        """Apply stemming to tokens"""
        return [self.stemmer.stem(token) for token in tokens]
    
    def extract_keywords(self, text: str, use_stemming: bool = True) -> List[str]:
        """Extract keywords from text"""
        # Tokenize
        tokens = self.tokenize(text)
        
        # Remove stop words
        tokens = self.remove_stop_words(tokens)
        
        # Apply stemming if requested
        if use_stemming:
            tokens = self.stem_tokens(tokens)
        
        # Remove duplicates and return
        return list(set(tokens))
    
    def calculate_word_frequency(self, text: str) -> Dict[str, int]:
        """Calculate word frequency in text"""
        keywords = self.extract_keywords(text, use_stemming=False)
        frequency = {}
        
        for word in keywords:
            frequency[word] = frequency.get(word, 0) + 1
        
        return frequency
    
    def extract_medical_terms(self, text: str, medical_keywords: Set[str]) -> List[str]:
        """Extract medical terms from text using a predefined medical keyword set"""
        keywords = self.extract_keywords(text, use_stemming=False)
        
        # Find medical terms
        medical_terms = []
        for keyword in keywords:
            for medical_term in medical_keywords:
                if medical_term.lower() in keyword.lower() or keyword.lower() in medical_term.lower():
                    medical_terms.append(medical_term)
        
        return list(set(medical_terms))
    
    def normalize_medical_text(self, text: str) -> str:
        """Normalize medical text for processing"""
        if not text:
            return ""
        
        # Common medical abbreviations normalization
        abbreviations = {
            'tc': 'température corporelle',
            'ta': 'tension artérielle',
            'fc': 'fréquence cardiaque',
            'spo2': 'saturation en oxygène',
            'imc': 'indice de masse corporelle',
            'rdv': 'rendez-vous',
            'exam': 'examen',
            'diag': 'diagnostic'
        }
        
        # Replace abbreviations
        for abbr, full in abbreviations.items():
            text = re.sub(r'\b' + re.escape(abbr) + r'\b', full, text, flags=re.IGNORECASE)
        
        return text
    
    def extract_vital_signs(self, text: str) -> Dict[str, str]:
        """Extract vital signs from medical text"""
        vital_signs = {}
        
        # Temperature patterns
        temp_patterns = [
            r'température[:\s]*(\d+\.?\d*)°?',
            r'temp[:\s]*(\d+\.?\d*)°?',
            r'fièvre[:\s]*(\d+\.?\d*)°?'
        ]
        
        for pattern in temp_patterns:
            match = re.search(pattern, text.lower())
            if match:
                vital_signs['température'] = match.group(1) + '°C'
                break
        
        # Blood pressure patterns
        bp_patterns = [
            r'tension[:\s]*(\d+)/(\d+)',
            r'ta[:\s]*(\d+)/(\d+)',
            r'pression[:\s]*(\d+)/(\d+)'
        ]
        
        for pattern in bp_patterns:
            match = re.search(pattern, text.lower())
            if match:
                vital_signs['tension_artérielle'] = f"{match.group(1)}/{match.group(2)} mmHg"
                break
        
        # Weight patterns
        weight_patterns = [
            r'poids[:\s]*(\d+)\s*kg',
            r'pèse[:\s]*(\d+)\s*kg'
        ]
        
        for pattern in weight_patterns:
            match = re.search(pattern, text.lower())
            if match:
                vital_signs['poids'] = match.group(1) + ' kg'
                break
        
        return vital_signs
    
    def assess_text_complexity(self, text: str) -> Dict[str, float]:
        """Assess complexity of medical text"""
        if not text:
            return {'word_count': 0, 'sentence_count': 0, 'avg_words_per_sentence': 0}
        
        # Count words
        words = self.tokenize(text)
        word_count = len(words)
        
        # Count sentences
        sentences = re.split(r'[.!?]+', text)
        sentence_count = len([s for s in sentences if s.strip()])
        
        # Average words per sentence
        avg_words = word_count / sentence_count if sentence_count > 0 else 0
        
        return {
            'word_count': word_count,
            'sentence_count': sentence_count,
            'avg_words_per_sentence': avg_words
        }

# Example usage and testing
if __name__ == "__main__":
    processor = NLPProcessor()
    
    # Test text
    test_text = "Patient présente douleur thoracique intense, fièvre à 38.5°C, TA 140/90. Souffle depuis 2 jours."
    
    print("=== NLP Processor Test ===")
    print(f"Original text: {test_text}")
    print(f"Cleaned text: {processor.clean_text(test_text)}")
    print(f"Keywords: {processor.extract_keywords(test_text)}")
    print(f"Vital signs: {processor.extract_vital_signs(test_text)}")
    print(f"Text complexity: {processor.assess_text_complexity(test_text)}")
