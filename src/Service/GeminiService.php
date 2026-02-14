<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class GeminiService
{
    private HttpClientInterface $httpClient;
    private string $apiKey;

    public function __construct(HttpClientInterface $httpClient, string $geminiApiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $geminiApiKey;
    }

    public function getNutritionalInfo(string $query): ?array
    {
        // Mode test : retourne des données fixes pour tester l'interface
        if (strpos(strtolower($query), 'riz') !== false) {
            return [
                'calories' => 130,
                'proteines' => 2.7,
                'glucides' => 28,
                'lipides' => 0.3
            ];
        }

        // Pour les autres aliments, essayer l'API Gemini
        $prompt = "Tu es un expert en nutrition. Pour la question suivante, fournis uniquement les informations nutritionnelles au format JSON avec les clés exactes : calories (en kcal), proteines (en g), glucides (en g), lipides (en g). Réponds uniquement avec le JSON, sans aucun autre texte.

Question: {$query}

Réponse JSON:";

        try {
            $response = $this->httpClient->request('POST', 'https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent', [
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                [
                                    'text' => $prompt
                                ]
                            ]
                        ]
                    ]
                ],
                'query' => [
                    'key' => $this->apiKey
                ]
            ]);

            $data = $response->toArray();
            
            if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                $text = trim($data['candidates'][0]['content']['parts'][0]['text']);
                
                // Nettoyer le texte pour extraire le JSON
                $text = preg_replace('/```json\s*/', '', $text);
                $text = preg_replace('/```\s*$/', '', $text);
                $text = trim($text);
                
                $nutritionData = json_decode($text, true);
                
                if (json_last_error() === JSON_ERROR_NONE && 
                    isset($nutritionData['calories']) && 
                    isset($nutritionData['proteines']) && 
                    isset($nutritionData['glucides']) && 
                    isset($nutritionData['lipides'])) {
                    
                    return [
                        'calories' => (float) $nutritionData['calories'],
                        'proteines' => (float) $nutritionData['proteines'],
                        'glucides' => (float) $nutritionData['glucides'],
                        'lipides' => (float) $nutritionData['lipides']
                    ];
                }
            }
        } catch (\Exception $e) {
            // En cas d'erreur, on retourne null
            error_log('Gemini API Error: ' . $e->getMessage());
            return null;
        }

        return null;
    }
}
