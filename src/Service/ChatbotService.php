<?php

namespace App\Service;

use App\Repository\ExerciceRepository;
use App\Repository\SeanceSportRepository;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ChatbotService
{
    public function __construct(
        private ExerciceRepository $exerciceRepo,
        private SeanceSportRepository $seanceRepo,
        private HttpClientInterface $httpClient
    ) {}

    public function repondre(string $message): string
    {
        $messagePropre = $this->normaliser(strtolower(trim($message)));

        if (str_contains($messagePropre, 'exercice')) {
            $exercices = $this->exerciceRepo->findAll();
            if (empty($exercices)) {
                return "Aucun exercice trouve dans la base de donnees.";
            }
            $lignes = [];
            foreach ($exercices as $e) {
                $lignes[] = "- " . $e->getNomExercice()
                    . " | Intensite: " . $e->getIntensite()->value
                    . " | " . $e->getCaloriesParMinute() . " cal/min";
            }
            return "Exercices disponibles :\n" . implode("\n", $lignes);
        }

        if (str_contains($messagePropre, 'seance')) {
            $seances = $this->seanceRepo->findAll();
            if (empty($seances)) {
                return "Aucune seance trouvee dans la base de donnees.";
            }
            $lignes = [];
            foreach ($seances as $s) {
                $lignes[] = "- " . $s->getNomSeance()
                    . " | Duree: " . $s->getDureeMinutes() . " min"
                    . " | Date: " . $s->getDateSeance()->format('d/m/Y');
            }
            return "Seances disponibles :\n" . implode("\n", $lignes);
        }

        return $this->demanderGroq($message);
    }

    private function demanderGroq(string $message): string
    {
        $apiKey = $_SERVER['GROQ_API_KEY'] ?? $_ENV['GROQ_API_KEY'] ?? getenv('GROQ_API_KEY');

        if (empty($apiKey)) {
            return "Cle Groq manquante dans .env";
        }

        try {
            $response = $this->httpClient->request('POST', 'https://api.groq.com/openai/v1/chat/completions', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $apiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model'    => 'llama-3.3-70b-versatile',
                    'messages' => [
                        ['role' => 'user', 'content' => "Tu es un coach sportif. Reponds en francais a : $message"]
                    ],
                    'max_tokens' => 500,
                ]
            ]);

            $data = $response->toArray(false);
            return $data['choices'][0]['message']['content']
                ?? "Je n'ai pas pu obtenir une reponse.";

        } catch (\Exception $e) {
            return "Erreur : " . $e->getMessage();
        }
    }

    private function normaliser(string $texte): string
    {
        $remplacements = [
            'é' => 'e', 'è' => 'e', 'ê' => 'e',
            'à' => 'a', 'â' => 'a',
            'ô' => 'o', 'ù' => 'u', 'û' => 'u',
            'î' => 'i', 'ï' => 'i', 'ç' => 'c',
        ];
        return strtr($texte, $remplacements);
    }
}