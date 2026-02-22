<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;

class GeminiService
{
    private HttpClientInterface $httpClient;
    private string $apiKey;

    public function __construct(HttpClientInterface $httpClient, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->apiKey = $apiKey;
    }

    /**
     * Récupère les informations nutritionnelles via l'API Gemini
     */
    public function getNutritionalInfo(string $query): ?array
    {
        try {
            error_log("=== GEMINI API REQUEST ===");
            error_log("Query: " . $query);
            
            // Vérifier si la question concerne la nutrition
            if (!$this->isNutritionQuestion($query)) {
                error_log("Question non nutritionnelle détectée");
                return [
                    'calories' => 0,
                    'proteines' => 0.0,
                    'glucides' => 0.0,
                    'lipides' => 0.0,
                    'error' => "Désolé, je ne peux répondre qu'aux questions sur les valeurs nutritionnelles (calories, protéines, glucides, lipides) des aliments."
                ];
            }
            
            $prompt = "Donne les valeurs nutritionnelles pour 100g de: {$query}. Réponds UNIQUEMENT avec un objet JSON valide comme ceci: {\"nomAliment\": \"nom de l'aliment\", \"calories\": 52, \"proteines\": 0.3, \"glucides\": 14, \"lipides\": 0.2}. Ne mets aucun texte avant ou après le JSON.";
            
            error_log("Prompt: " . $prompt);
            
            // Mettre la clé API dans l'URL
            $url = 'https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=' . $this->apiKey;
            
            $response = $this->httpClient->request('POST', $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'contents' => [
                        [
                            'parts' => [
                                [
                                    'text' => $prompt
                                ]
                            ]
                        ]
                    ],
                    'generationConfig' => [
                        'temperature' => 0.1,
                        'maxOutputTokens' => 150,
                    ]
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getContent(false);
            
            error_log("Gemini API Status Code: " . $statusCode);
            error_log("Gemini API Response: " . $content);
            
            if ($statusCode === 200) {
                $data = json_decode($content, true);
                
                error_log("Parsed Gemini Response: " . print_r($data, true));
                
                if (isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                    $nutritionText = $data['candidates'][0]['content']['parts'][0]['text'];
                    error_log("Gemini Nutrition Text: " . $nutritionText);
                    
                    // Nettoyer le texte avant de le parser
                    $nutritionText = trim($nutritionText);
                    // Enlever les marqueurs de code markdown si présents
                    $nutritionText = preg_replace('/```json\s*|\s*```/', '', $nutritionText);
                    // Enlever tout ce qui n'est pas le JSON
                    if (preg_match('/\{.*\}/s', $nutritionText, $matches)) {
                        $nutritionText = $matches[0];
                    }
                    
                    $result = $this->parseNutritionResponse($nutritionText);
                    error_log("Final Parsed Result: " . print_r($result, true));
                    
                    // Si le parsing a échoué, utiliser les valeurs par défaut
                    if ($result === null || $result['calories'] === 0) {
                        error_log("Parsing failed, using fallback values");
                        return $this->getFallbackValues($query);
                    }
                    
                    return $result;
                } else {
                    error_log("No content in Gemini response structure");
                }
            } else {
                error_log("Gemini API returned status: " . $statusCode);
                error_log("Error response: " . $content);
            }

            return $this->getFallbackValues($query);
            
        } catch (TransportExceptionInterface $e) {
            error_log('Gemini API Transport Exception: ' . $e->getMessage());
            return $this->getFallbackValues($query);
        } catch (ClientExceptionInterface $e) {
            error_log('Gemini API Client Exception: ' . $e->getMessage());
            return $this->getFallbackValues($query);
        } catch (ServerExceptionInterface $e) {
            error_log('Gemini API Server Exception: ' . $e->getMessage());
            return $this->getFallbackValues($query);
        } catch (RedirectionExceptionInterface $e) {
            error_log('Gemini API Redirection Exception: ' . $e->getMessage());
            return $this->getFallbackValues($query);
        } catch (\Exception $e) {
            error_log('Gemini API Generic Exception: ' . $e->getMessage());
            error_log('Exception trace: ' . $e->getTraceAsString());
            return $this->getFallbackValues($query);
        }
    }

    /**
     * Vérifie si la question concerne la nutrition
     */
    private function isNutritionQuestion(string $query): bool
    {
        $query = strtolower($query);
        
        // Mots-clés nutritionnels
        $nutritionKeywords = [
            'calorie', 'calories', 'kcal',
            'proteine', 'proteines', 'protéine', 'protéines', 'prot',
            'glucide', 'glucides', 'carbs', 'carbohydrate',
            'lipide', 'lipides', 'fat', 'graisse', 'matière grasse',
            'nutrition', 'nutritif', 'nutritive', 'valeur nutritionnelle',
            'combien de', 'apport', 'teneur', 'quantité',
            '100g', '100 grammes', 'portion'
        ];
        
        // Vérifier si au moins un mot-clé nutritionnel est présent
        foreach ($nutritionKeywords as $keyword) {
            if (strpos($query, $keyword) !== false) {
                error_log("Mot-clé nutritionnel trouvé: " . $keyword);
                return true;
            }
        }
        
        // Liste des aliments courants (si la requête contient un aliment, on suppose que c'est nutritionnel)
        $foodKeywords = [
            'pomme', 'banane', 'orange', 'fruit', 'legume', 'légume',
            'viande', 'poulet', 'boeuf', 'bœuf', 'poisson', 'oeuf', 'œuf',
            'riz', 'pates', 'pâtes', 'pain', 'lait', 'fromage', 'yaourt',
            'salade', 'tomate', 'carotte', 'pomme de terre', 'steak',
            'saumon', 'riz', 'poulet', 'salade', 'soupe', 'sandwich'
        ];
        
        foreach ($foodKeywords as $food) {
            if (strpos($query, $food) !== false) {
                error_log("Nom d'aliment trouvé: " . $food);
                return true;
            }
        }
        
        // Si on arrive ici, aucune correspondance trouvée
        error_log("Aucun mot-clé nutritionnel ou aliment trouvé");
        return false;
    }

    /**
     * Parse la réponse de Gemini pour extraire les données nutritionnelles
     */
    private function parseNutritionResponse(string $response): ?array
    {
        try {
            error_log("=== PARSING GEMINI RESPONSE ===");
            error_log("Raw response: " . $response);
            
            // Essayer de décoder directement le JSON
            $data = json_decode($response, true);
            if (json_last_error() === JSON_ERROR_NONE) {
                $result = [
                    'nomAliment' => $data['nomAliment'] ?? '',
                    'calories' => (int)($data['calories'] ?? 0),
                    'proteines' => (float)($data['proteines'] ?? 0),
                    'glucides' => (float)($data['glucides'] ?? 0),
                    'lipides' => (float)($data['lipides'] ?? 0)
                ];
                error_log("Successfully parsed JSON directly: " . print_r($result, true));
                return $result;
            }
            
            // Chercher un JSON dans la réponse
            if (preg_match('/\{[^}]+\}/', $response, $matches)) {
                $jsonString = $matches[0];
                error_log("Extracted JSON: " . $jsonString);
                
                $data = json_decode($jsonString, true);
                if (json_last_error() === JSON_ERROR_NONE) {
                    $result = [
                        'nomAliment' => $data['nomAliment'] ?? '',
                        'calories' => (int)($data['calories'] ?? 0),
                        'proteines' => (float)($data['proteines'] ?? 0),
                        'glucides' => (float)($data['glucides'] ?? 0),
                        'lipides' => (float)($data['lipides'] ?? 0)
                    ];
                    error_log("Successfully parsed extracted JSON: " . print_r($result, true));
                    return $result;
                } else {
                    error_log("JSON decode error: " . json_last_error_msg());
                }
            }
            
            // Si pas de JSON trouvé, essayer d'extraire les nombres
            error_log("No JSON found, trying regex extraction");
            return $this->extractNumbersWithAdvancedRegex($response);
            
        } catch (\Exception $e) {
            error_log('Error parsing Gemini response: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Extrait les nombres avec des regex avancées
     */
    private function extractNumbersWithAdvancedRegex(string $response): ?array
    {
        $result = [
            'nomAliment' => '',
            'calories' => 0,
            'proteines' => 0.0,
            'glucides' => 0.0,
            'lipides' => 0.0
        ];

        // Extraire les calories
        if (preg_match('/(?:calories?|cal|kcal|énergie)[^\d]*(\d+(?:\.\d+)?)/i', $response, $matches)) {
            $result['calories'] = (int)floatval($matches[1]);
            error_log("Found calories: " . $result['calories']);
        }

        // Extraire les protéines
        if (preg_match('/(?:prot[èe]ines?|prot|protein)[^\d]*(\d+(?:\.\d+)?)/i', $response, $matches)) {
            $result['proteines'] = floatval($matches[1]);
            error_log("Found proteines: " . $result['proteines']);
        }

        // Extraire les glucides
        if (preg_match('/(?:glucides?|gluc|glucose|sucres?|carbs?)[^\d]*(\d+(?:\.\d+)?)/i', $response, $matches)) {
            $result['glucides'] = floatval($matches[1]);
            error_log("Found glucides: " . $result['glucides']);
        }

        // Extraire les lipides
        if (preg_match('/(?:lipides?|lip|fats?|matières? grasses?)[^\d]*(\d+(?:\.\d+)?)/i', $response, $matches)) {
            $result['lipides'] = floatval($matches[1]);
            error_log("Found lipides: " . $result['lipides']);
        }

        error_log("Regex extraction final result: " . print_r($result, true));
        
        return $result;
    }

    /**
     * Retourne des valeurs par défaut basées sur des aliments courants
     */
    private function getFallbackValues(string $query): array
    {
        $query = strtolower($query);
        
        // Base de données simple pour les aliments courants (pour 100g)
        $fallbackDatabase = [
            'pomme' => ['nomAliment' => 'Pomme', 'calories' => 52, 'proteines' => 0.3, 'glucides' => 14, 'lipides' => 0.2],
            'pomme de terre' => ['nomAliment' => 'Pomme de terre', 'calories' => 77, 'proteines' => 2.0, 'glucides' => 17, 'lipides' => 0.1],
            'riz' => ['nomAliment' => 'Riz', 'calories' => 130, 'proteines' => 2.7, 'glucides' => 28, 'lipides' => 0.3],
            'poulet' => ['nomAliment' => 'Poulet', 'calories' => 165, 'proteines' => 31, 'glucides' => 0, 'lipides' => 3.6],
            'boeuf' => ['nomAliment' => 'Bœuf', 'calories' => 250, 'proteines' => 26, 'glucides' => 0, 'lipides' => 15],
            'bœuf' => ['nomAliment' => 'Bœuf', 'calories' => 250, 'proteines' => 26, 'glucides' => 0, 'lipides' => 15],
            'saumon' => ['nomAliment' => 'Saumon', 'calories' => 208, 'proteines' => 20, 'glucides' => 0, 'lipides' => 13],
            'oeuf' => ['nomAliment' => 'Œuf', 'calories' => 155, 'proteines' => 13, 'glucides' => 1.1, 'lipides' => 11],
            'œuf' => ['nomAliment' => 'Œuf', 'calories' => 155, 'proteines' => 13, 'glucides' => 1.1, 'lipides' => 11],
            'pates' => ['nomAliment' => 'Pâtes', 'calories' => 131, 'proteines' => 5, 'glucides' => 25, 'lipides' => 1.1],
            'pâtes' => ['nomAliment' => 'Pâtes', 'calories' => 131, 'proteines' => 5, 'glucides' => 25, 'lipides' => 1.1],
            'pain' => ['nomAliment' => 'Pain', 'calories' => 265, 'proteines' => 9, 'glucides' => 49, 'lipides' => 3.2],
            'lait' => ['nomAliment' => 'Lait', 'calories' => 42, 'proteines' => 3.4, 'glucides' => 5, 'lipides' => 1],
            'fromage' => ['nomAliment' => 'Fromage', 'calories' => 113, 'proteines' => 7, 'glucides' => 1, 'lipides' => 9],
            'yaourt' => ['nomAliment' => 'Yaourt', 'calories' => 59, 'proteines' => 10, 'glucides' => 3.6, 'lipides' => 0.4],
            'salade' => ['nomAliment' => 'Salade', 'calories' => 15, 'proteines' => 1.4, 'glucides' => 2.9, 'lipides' => 0.2],
            'tomate' => ['nomAliment' => 'Tomate', 'calories' => 18, 'proteines' => 0.9, 'glucides' => 3.9, 'lipides' => 0.2],
            'carotte' => ['nomAliment' => 'Carotte', 'calories' => 41, 'proteines' => 0.9, 'glucides' => 10, 'lipides' => 0.2],
            'banane' => ['nomAliment' => 'Banane', 'calories' => 89, 'proteines' => 1.1, 'glucides' => 23, 'lipides' => 0.3],
            'steak' => ['nomAliment' => 'Steak', 'calories' => 271, 'proteines' => 26, 'glucides' => 0, 'lipides' => 17],
            'poisson' => ['nomAliment' => 'Poisson', 'calories' => 150, 'proteines' => 20, 'glucides' => 0, 'lipides' => 8],
            'viande' => ['nomAliment' => 'Viande', 'calories' => 200, 'proteines' => 25, 'glucides' => 0, 'lipides' => 12],
            'legume' => ['nomAliment' => 'Légume', 'calories' => 30, 'proteines' => 2, 'glucides' => 5, 'lipides' => 0.3],
            'légume' => ['nomAliment' => 'Légume', 'calories' => 30, 'proteines' => 2, 'glucides' => 5, 'lipides' => 0.3],
            'fruit' => ['nomAliment' => 'Fruit', 'calories' => 60, 'proteines' => 1, 'glucides' => 15, 'lipides' => 0.2],
        ];

        // Chercher une correspondance dans la base de données
        foreach ($fallbackDatabase as $food => $values) {
            if (strpos($query, $food) !== false) {
                error_log("Found fallback match for: " . $food . " -> " . print_r($values, true));
                return $values;
            }
        }

        // Valeurs par défaut si rien trouvé
        error_log("No match found, using default values");
        return ['nomAliment' => '', 'calories' => 50, 'proteines' => 1.0, 'glucides' => 10.0, 'lipides' => 0.5];
    }
}