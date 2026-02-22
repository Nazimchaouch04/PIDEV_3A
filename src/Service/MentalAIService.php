<?php

namespace App\Service;

use App\Entity\Utilisateur;
use App\Entity\QuizMental;
use App\Entity\SeanceSport;
use App\Entity\Repas;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Doctrine\ORM\EntityManagerInterface;

class MentalAIService
{
    private string $pythonApiUrl = 'http://localhost:8002';

    public function __construct(
        private HttpClientInterface $httpClient,
        private EntityManagerInterface $em
    ) {}

    /**
     * Appelle l'analyse de fatigue jitter sur le microservice Python
     */
    public function getFatigueAnalysis(Utilisateur $user): array
    {
        $quizzes = $this->em->getRepository(QuizMental::class)
            ->findBy(['utilisateur' => $user], ['dateQuiz' => 'DESC'], 1);

        if (empty($quizzes)) {
            return ['level' => 'unknown', 'message' => 'Pas de données de quiz.'];
        }

        // Simuler ou récupérer les timings individuels des questions (si stockés)
        // Pour l'instant, on envoie le temps moyen si on n'a pas les détails, 
        // ou on simule une série basée sur le temps moyen pour la démo technique.
        $avgTime = $quizzes[0]->getTempsMoyenReponse() ?? 5.0;
        $simulatedTimings = [
            $avgTime * 0.9, 
            $avgTime * 1.1, 
            $avgTime * 0.8, 
            $avgTime * 1.2, 
            $avgTime
        ];

        try {
            $response = $this->httpClient->request('POST', "{$this->pythonApiUrl}/analyze/fatigue", [
                'json' => $simulatedTimings
            ]);

            return $response->toArray();
        } catch (\Exception $e) {
            return ['error' => $e->getMessage(), 'level' => 'unknown'];
        }
    }

    /**
     * Appelle la prédiction de performance sur le microservice Python
     */
    public function getPerformancePrediction(Utilisateur $user): array
    {
        $quizzes = $this->em->getRepository(QuizMental::class)
            ->findBy(['utilisateur' => $user], ['dateQuiz' => 'DESC'], 10);

        $history = [];
        foreach ($quizzes as $q) {
            $history[] = [
                'score' => $q->getScoreResultat(),
                'date' => $q->getDateQuiz()->format('Y-m-d')
            ];
        }

        // Si aucun quiz, créer des données de démonstration
        if (empty($history)) {
            $history = [
                ['score' => 70, 'date' => date('Y-m-d', strtotime('-5 days'))],
                ['score' => 75, 'date' => date('Y-m-d', strtotime('-4 days'))],
                ['score' => 72, 'date' => date('Y-m-d', strtotime('-3 days'))],
                ['score' => 78, 'date' => date('Y-m-d', strtotime('-2 days'))],
                ['score' => 80, 'date' => date('Y-m-d', strtotime('-1 day'))]
            ];
        }

        try {
            $response = $this->httpClient->request('POST', "{$this->pythonApiUrl}/analyze/prediction", [
                'json' => array_reverse($history)
            ]);

            return $response->toArray();
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    /**
     * Récupère un conseil du coach via OpenAI (via Python)
     */
    public function getCoachAdvice(Utilisateur $user, string $checkinText): string
    {
        // Agrégation de données 360° pour le contexte
        $lastSport = $this->em->getRepository(SeanceSport::class)->findOneBy(['utilisateur' => $user], ['dateSeance' => 'DESC']);
        $lastRepas = $this->em->getRepository(Repas::class)->findOneBy(['utilisateur' => $user], ['dateConsommation' => 'DESC']);
        $lastQuiz = $this->em->getRepository(QuizMental::class)->findOneBy(['utilisateur' => $user], ['dateQuiz' => 'DESC']);

        $payload = [
            'user_data' => [
                'fatigue_level' => $this->getFatigueAnalysis($user)['level'] ?? 'stable',
                'last_sport_score' => $lastSport ? round($lastSport->getDureeMinutes() / 10, 1) : 0,
                'avg_calories' => $lastRepas ? $lastRepas->getTotalCalories() : 2000,
                'last_mental_score' => $lastQuiz ? $lastQuiz->getScoreResultat() : 50
            ],
            'checkin_text' => $checkinText
        ];

        try {
            $response = $this->httpClient->request('POST', "{$this->pythonApiUrl}/coach/advice", [
                'json' => $payload
            ]);

            return $response->toArray()['advice'];
        } catch (\Exception $e) {
            return "Je suis un peu déconnecté pour le moment. Respire bien !";
        }
    }

    /**
     * Vérifie si l'API est accessible
     */
    public function isApiAvailable(): bool
    {
        try {
            $response = $this->httpClient->request('GET', $this->pythonApiUrl . '/');
            return $response->getStatusCode() === 200;
        } catch (\Exception $e) {
            return false;
        }
    }
}
