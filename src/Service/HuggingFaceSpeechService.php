<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class HuggingFaceSpeechService
{
    private HttpClientInterface $httpClient;
    private LoggerInterface $logger;
    private string $apiKey;

    public function __construct(HttpClientInterface $httpClient, LoggerInterface $logger, string $apiKey)
    {
        $this->httpClient = $httpClient;
        $this->logger = $logger;
        $this->apiKey = $apiKey;
    }

    /**
     * Transcrit un fichier audio en texte avec Whisper
     */
    public function transcribeAudio(string $audioFilePath): ?string
    {
        try {
            $this->logger->info('Début de la transcription audio', ['file' => $audioFilePath]);

            // Lire le contenu du fichier audio
            $audioContent = file_get_contents($audioFilePath);
            
            if ($audioContent === false) {
                throw new \Exception("Impossible de lire le fichier audio");
            }

            // Appel à l'API HuggingFace Whisper avec l'URL d'inférence correcte
            $response = $this->httpClient->request('POST', 'https://api-inference.huggingface.co/models/openai/whisper-large-v3', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    // On envoie un flux binaire générique pour laisser l'API détecter le format (webm/opus, etc.)
                    'Content-Type' => 'application/octet-stream',
                ],
                'body' => $audioContent,
                'timeout' => 30,
            ]);

            $statusCode = $response->getStatusCode();
            $content = $response->getContent(false);
            
            $this->logger->info('Réponse HuggingFace', [
                'status' => $statusCode,
                'content' => $content
            ]);

            if ($statusCode === 200) {
                $data = json_decode($content, true);
                
                if (isset($data['text'])) {
                    $this->logger->info('Transcription réussie', ['text' => $data['text']]);
                    return $data['text'];
                } elseif (is_string($data)) {
                    // Parfois l'API retourne directement le texte
                    return $data;
                }
            } elseif ($statusCode === 503) {
                // Le modèle se charge, on attend un peu
                $this->logger->info('Modèle en chargement, nouvelle tentative dans 5 secondes');
                sleep(5);
                return $this->transcribeAudio($audioFilePath);
            }

            return null;

        } catch (\Exception $e) {
            $this->logger->error('Erreur de transcription: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Extrait les informations nutritionnelles du texte transcrit
     */
    public function extractNutritionInfo(string $text): array
    {
        // Nettoyer le texte
        $text = strtolower(trim($text));
        
        // Enlever la ponctuation
        $text = preg_replace('/[?,.!;:]/', '', $text);
        
        // Regex pour extraire l'aliment et la quantité
        $quantity = 100; // valeur par défaut
        $food = $text;

        // Pattern pour "Xg aliment" ou "X grammes aliment"
        if (preg_match('/(\d+)\s*(?:g|grammes?)\s+(.+)/i', $text, $matches)) {
            $quantity = (int)$matches[1];
            $food = trim($matches[2]);
        } else {
            // Si pas de quantité, on prend tout le texte comme aliment
            $food = $text;
        }

        // Base de données d'aliments (fallback)
        $foodDatabase = [
            'riz' => ['calories' => 130, 'proteines' => 2.7, 'glucides' => 28, 'lipides' => 0.3],
            'pomme' => ['calories' => 52, 'proteines' => 0.3, 'glucides' => 14, 'lipides' => 0.2],
            'banane' => ['calories' => 89, 'proteines' => 1.1, 'glucides' => 23, 'lipides' => 0.3],
            'poulet' => ['calories' => 165, 'proteines' => 31, 'glucides' => 0, 'lipides' => 3.6],
            'pain' => ['calories' => 265, 'proteines' => 9, 'glucides' => 49, 'lipides' => 3.2],
            'lait' => ['calories' => 42, 'proteines' => 3.4, 'glucides' => 5, 'lipides' => 1],
            'oeuf' => ['calories' => 155, 'proteines' => 13, 'glucides' => 1.1, 'lipides' => 11],
            'pates' => ['calories' => 131, 'proteines' => 5, 'glucides' => 25, 'lipides' => 1.1],
            'pâtes' => ['calories' => 131, 'proteines' => 5, 'glucides' => 25, 'lipides' => 1.1],
            'steak' => ['calories' => 271, 'proteines' => 26, 'glucides' => 0, 'lipides' => 17],
            'saumon' => ['calories' => 208, 'proteines' => 20, 'glucides' => 0, 'lipides' => 13],
            'pomme de terre' => ['calories' => 77, 'proteines' => 2.0, 'glucides' => 17, 'lipides' => 0.1],
            'carotte' => ['calories' => 41, 'proteines' => 0.9, 'glucides' => 10, 'lipides' => 0.2],
            'tomate' => ['calories' => 18, 'proteines' => 0.9, 'glucides' => 3.9, 'lipides' => 0.2],
        ];

        // Chercher l'aliment dans la base
        $nutritionInfo = null;
        $foundFood = null;
        
        // Nettoyer le texte pour la recherche
        $cleanFood = trim($food);
        
        foreach ($foodDatabase as $foodName => $values) {
            // Recherche insensible à la casse et avec correspondance partielle
            if (stripos($cleanFood, $foodName) !== false || stripos($foodName, $cleanFood) !== false) {
                $nutritionInfo = $values;
                $foundFood = $foodName;
                $this->logger->info('Aliment trouvé dans la base', [
                    'search' => $cleanFood,
                    'found' => $foodName,
                    'values' => $values
                ]);
                break;
            }
        }

        if (!$nutritionInfo) {
            return [
                'success' => false,
                'message' => "Aliment non reconnu: {$food}",
                'food' => $food,
                'quantity' => $quantity
            ];
        }

        // Multiplier par la quantité si différente de 100g
        if ($quantity !== 100) {
            $factor = $quantity / 100;
            $nutritionInfo['calories'] = round($nutritionInfo['calories'] * $factor);
            $nutritionInfo['proteines'] = round($nutritionInfo['proteines'] * $factor, 1);
            $nutritionInfo['glucides'] = round($nutritionInfo['glucides'] * $factor, 1);
            $nutritionInfo['lipides'] = round($nutritionInfo['lipides'] * $factor, 1);
        }

        return [
            'success' => true,
            'food' => $foundFood,
            'quantity' => $quantity,
            'unit' => 'g',
            'calories' => $nutritionInfo['calories'],
            'proteines' => $nutritionInfo['proteines'],
            'glucides' => $nutritionInfo['glucides'],
            'lipides' => $nutritionInfo['lipides']
        ];
    }
}