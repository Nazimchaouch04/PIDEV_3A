<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class CalorieNinjasService
{
    public function __construct(
        private HttpClientInterface $client,
        private string $apiKey = ''
    ) {}

    // ✅ Déjà existant
    public function getCaloriesBrulees(string $activite, int $dureeMinutes): array
    {
        try {
            $response = $this->client->request('GET', 'https://api.api-ninjas.com/v1/caloriesburned', [
                'headers' => ['X-Api-Key' => $this->apiKey],
                'query' => [
                    'activity' => $activite,
                    'duration' => $dureeMinutes,
                ],
            ]);

            $data = $response->toArray(false);

            return $data[0] ?? [
                'name' => $activite,
                'calories_per_hour' => 0,
                'duration_minutes' => $dureeMinutes,
                'total_calories' => 0,
            ];

        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
                'name' => $activite,
                'calories_per_hour' => 0,
                'duration_minutes' => $dureeMinutes,
                'total_calories' => 0,
            ];
        }
    }

    // ✅ NOUVEAU — Recommandations d'exercices
    public function getExercicesByMuscle(string $muscle): array
    {
        try {
            $response = $this->client->request('GET', 'https://api.api-ninjas.com/v1/exercises', [
                'headers' => ['X-Api-Key' => $this->apiKey],
                'query' => ['muscle' => $muscle],
            ]);

            return $response->toArray(false);

        } catch (\Exception $e) {
            return [];
        }
    }
}