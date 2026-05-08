<?php
namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProgrammeIAService
{
    private string $groqUrl = 'https://api.groq.com/openai/v1/chat/completions';

    public function __construct(
        private HttpClientInterface $client,
        private string $groqApiKey = ''
    ) {}

    public function genererProgramme(
        int $age,
        float $poids,
        float $taille,
        string $objectif,
        string $niveau,
        int $jours,
        string $muscle
    ): string {
        $imc = round($poids / (($taille / 100) ** 2), 1);

        $prompt = "Tu es un coach sportif expert. Genere un programme d entrainement complet en francais.\n\n"
            . "Profil de l utilisateur :\n"
            . "- Age : {$age} ans\n"
            . "- Poids : {$poids} kg\n"
            . "- Taille : {$taille} cm\n"
            . "- IMC : {$imc}\n"
            . "- Objectif : {$objectif}\n"
            . "- Niveau : {$niveau}\n"
            . "- Jours disponibles par semaine : {$jours}\n"
            . "- Muscle cible : {$muscle}\n\n"
            . "Genere un programme structure avec :\n"
            . "1. Une introduction personnalisee basee sur le profil\n"
            . "2. Le programme jour par jour avec pour chaque exercice : nom, series, repetitions, temps de repos\n"
            . "3. Des conseils nutritionnels adaptes a l objectif\n"
            . "4. Des conseils de recuperation\n\n"
            . "Sois precis, motivant et adapte le programme au niveau et a l IMC de la personne.";

        try {
            $response = $this->client->request('POST', $this->groqUrl, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->groqApiKey,
                    'Content-Type'  => 'application/json',
                ],
                'json' => [
                    'model'    => 'llama-3.3-70b-versatile',
                    'messages' => [
                        ['role' => 'user', 'content' => $prompt]
                    ],
                    'max_tokens' => 2000,
                ],
            ]);

            $data = $response->toArray(false);
            return $data['choices'][0]['message']['content'] ?? 'Erreur de generation.';

        } catch (\Exception $e) {
            return 'Erreur : ' . $e->getMessage();
        }
    }
}