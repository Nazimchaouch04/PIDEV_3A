<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class MistralService
{
    private Client $client;
    private string $apiKey;
    private string $apiUrl;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->apiKey = $parameterBag->get('mistral_api_key');
        $this->apiUrl = 'https://api.mistral.ai/v1/chat/completions';
        
        $this->client = new Client([
            'timeout' => 30,
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ],
            'verify' => false, // Désactiver la vérification SSL pour les tests
        ]);
    }

    /**
     * Génère une question de quiz avec l'API Mistral
     */
    public function generateQuizQuestion(): ?array
    {
        $prompt = "Génère une question de quiz sur la santé mentale ou le bien-être. 
        La réponse doit être OBLIGATOIREMENT au format JSON exactement comme ceci:
        {
            \"enonce\": \"texte clair et précis de la question\",
            \"reponse_correcte\": \"la réponse correcte unique et exacte\",
            \"options_fausses\": [\"option fausse 1\", \"option fausse 2\", \"option fausse 3\"],
            \"points_valeur\": nombre_entier_entre_1_et_10
        }
        
        RÈGLES STRICTES:
        1. Le tableau 'options_fausses' doit contenir EXACTEMENT 3 éléments
        2. Toutes les réponses (correcte et fausses) doivent être distinctes et plausibles
        3. Les réponses fausses doivent être incorrectes mais crédibles
        4. La réponse correcte doit être factuellement exacte
        5. Les points (1-10) doivent correspondre à la difficulté réelle
        
        Exemple de qualité:
        Question: \"Quel est le principal symptôme de l'anxiété généralisée?\"
        Réponse correcte: \"Inquiétude excessive et persistante\"
        Réponses fausses: [\"Tristesse profonde\", \"Troubles du sommeil\", \"Perte d'appétit\"]
        
        Génère maintenant une question originale sur la santé mentale.";

        try {
            $response = $this->client->post($this->apiUrl, [
                'json' => [
                    'model' => 'mistral-small-latest',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],
                    'temperature' => 0.7,
                    'max_tokens' => 500
                ]
            ]);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();
            
            // Log pour diagnostiquer
            error_log("Mistral API Response - Status: $statusCode, Body: $body");
            
            if ($statusCode !== 200) {
                throw new \Exception("Erreur API Mistral - Status: $statusCode, Body: $body");
            }
            
            $data = json_decode($body, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new \Exception('Erreur de décodage JSON: ' . json_last_error_msg());
            }
            
            if (!isset($data['choices'][0]['message']['content'])) {
                throw new \Exception('Format de réponse inattendu de l\'API Mistral');
            }
            
            $content = $data['choices'][0]['message']['content'];
            
            // Extraire le JSON de la réponse
            if (preg_match('/\{.*\}/s', $content, $matches)) {
                $questionData = json_decode($matches[0], true);
                
                if (json_last_error() === JSON_ERROR_NONE && $this->validateQuestionData($questionData)) {
                    error_log("Mistral API - Question générée avec succès: " . json_encode($questionData));
                    return $questionData;
                }
            }
            
            error_log("Mistral API - Échec d'extraction du JSON de la réponse");
            return null;
            
        } catch (RequestException $e) {
            $responseBody = $e->hasResponse() ? $e->getResponse()->getBody()->getContents() : 'No response body';
            error_log("Mistral API Error: " . $e->getMessage() . " - Response: $responseBody");
            throw new \Exception('Erreur lors de l\'appel à l\'API Mistral: ' . $e->getMessage());
        }
    }

    /**
     * Valide les données de la question générée
     */
    private function validateQuestionData(array $data): bool
    {
        // Validation de base
        if (!isset($data['enonce']) || 
            empty($data['enonce']) ||
            !isset($data['reponse_correcte']) || 
            empty($data['reponse_correcte']) ||
            !isset($data['options_fausses']) || 
            !is_array($data['options_fausses']) || 
            count($data['options_fausses']) !== 3 ||
            !isset($data['points_valeur']) || 
            !is_int($data['points_valeur']) || 
            $data['points_valeur'] < 1 || 
            $data['points_valeur'] > 10) {
            return false;
        }

        // Validation supplémentaire : éviter les doublons
        $correctAnswer = strtolower(trim($data['reponse_correcte']));
        $wrongAnswers = array_map('strtolower', $data['options_fausses']);
        
        // Vérifier que la réponse correcte n'est pas dans les fausses
        if (in_array($correctAnswer, $wrongAnswers)) {
            return false;
        }
        
        // Vérifier que les 3 réponses fausses sont distinctes
        if (count(array_unique($wrongAnswers)) !== 3) {
            return false;
        }

        return true;
    }

    /**
     * Vérifie si la clé API est configurée
     */
    public function isConfigured(): bool
    {
        return !empty($this->apiKey) && $this->apiKey !== 'your_mistral_api_key_here';
    }

    /**
     * Génère une réponse personnalisée avec l'API Mistral
     */
    public function generateCustomResponse(string $prompt): ?array
    {
        try {
            $response = $this->client->post($this->apiUrl, [
                'json' => [
                    'model' => 'mistral-small-latest',
                    'messages' => [
                        [
                            'role' => 'user',
                            'content' => $prompt
                        ]
                    ],
                    'temperature' => 0.7,
                    'response_format' => ['type' => 'json_object']
                ]
            ]);

            $body = $response->getBody()->getContents();
            $data = json_decode($body, true);
            
            if (isset($data['choices'][0]['message']['content'])) {
                $content = $data['choices'][0]['message']['content'];
                return json_decode($content, true);
            }
        } catch (\Exception $e) {
            error_log("Mistral Custom Error: " . $e->getMessage());
        }

        return null;
    }
}
