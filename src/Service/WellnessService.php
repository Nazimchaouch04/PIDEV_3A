<?php

namespace App\Service;

use GuzzleHttp\Client;

class WellnessService
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://zenquotes.io/api/',
            'timeout'  => 5.0,
        ]);
    }

    public function getDailyQuote(): ?array
    {
        try {
            $response = $this->client->get('today');
            $data = json_decode($response->getBody()->getContents(), true);
            
            if (!empty($data) && isset($data[0])) {
                return [
                    'text' => $data[0]['q'],
                    'author' => $data[0]['a'],
                ];
            }
        } catch (\Exception $e) {
            error_log("Wellness API Error: " . $e->getMessage());
        }

        // Quote de secours
        return [
            'text' => "La santé mentale n'est pas une destination, mais un voyage.",
            'author' => "Anonyme"
        ];
    }

    public function getRelaxationResources(): array
    {
        return [
            [
                'title' => 'Respiration de Cohérence Cardiaque',
                'url' => 'https://www.youtube.com/results?search_query=cohérence+cardiaque',
                'description' => '5 minutes pour calmer votre système nerveux.'
            ],
            [
                'title' => 'Méditation Guidée - Sommeil',
                'url' => 'https://www.youtube.com/results?search_query=méditation+sommeil+guidée',
                'description' => 'Ressources pour une nuit paisible.'
            ],
            [
                'title' => 'Bruits Blancs / Nature',
                'url' => 'https://www.youtube.com/results?search_query=nature+sounds+relaxing',
                'description' => 'Sons apaisants pour la concentration.'
            ]
        ];
    }
}
