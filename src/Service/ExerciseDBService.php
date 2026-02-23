<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Service pour l'API ExerciseDB (gratuite via RapidAPI)
 * Donne : muscles ciblés, gif animation, niveau difficulté
 */
class ExerciseDBService
{
    // Mapping nom exercice français → nom anglais pour l'API
    private const TRADUCTIONS = [
        'yoga'          => 'yoga',
        'course'        => 'running',
        'vélo'          => 'cycling',
        'natation'      => 'swimming',
        'musculation'   => 'deadlift',
        'squat'         => 'squat',
        'pompes'        => 'push up',
        'abdominaux'    => 'crunch',
        'planche'       => 'plank',
        'burpees'       => 'burpee',
        'rameur'        => 'rowing',
        'corde'         => 'jump rope',
        'marche'        => 'walking',
        'gainage'       => 'plank',
    ];

    public function __construct(
        private HttpClientInterface $httpClient,
        private string $rapidApiKey = ''
    ) {
        $this->rapidApiKey = $_ENV['RAPIDAPI_KEY'] ?? '';
    }

    /**
     * Cherche les infos d'un exercice par nom
     * Retourne : ['muscle' => '...', 'equipment' => '...', 'niveau' => '...', 'gif' => '...']
     */
    public function getInfosExercice(string $nomExercice): array
    {
        if (!$this->rapidApiKey) {
            return $this->getInfosDefaut($nomExercice);
        }

        // Traduire le nom en anglais
        $nomAnglais = $this->traduire($nomExercice);

        try {
            $response = $this->httpClient->request('GET',
                'https://exercisedb.p.rapidapi.com/exercises/name/' . urlencode($nomAnglais),
                [
                    'headers' => [
                        'X-RapidAPI-Key'  => $this->rapidApiKey,
                        'X-RapidAPI-Host' => 'exercisedb.p.rapidapi.com',
                    ],
                ]
            );

            $data = $response->toArray();

            if (!empty($data[0])) {
                $ex = $data[0];
                return [
                    'muscle'     => ucfirst($ex['target'] ?? 'Non défini'),
                    'muscles_secondaires' => implode(', ', $ex['secondaryMuscles'] ?? []),
                    'equipment'  => ucfirst($ex['equipment'] ?? 'Aucun'),
                    'niveau'     => $this->traduireNiveau($ex['difficulty'] ?? ''),
                    'gif'        => $ex['gifUrl'] ?? null,
                    'found'      => true,
                ];
            }

            return $this->getInfosDefaut($nomExercice);

        } catch (\Exception $e) {
            return $this->getInfosDefaut($nomExercice);
        }
    }

    /**
     * Enrichit une liste d'exercices avec les infos ExerciseDB
     * @param array $exercices liste d'objets Exercice
     * @return array [['exercice' => ..., 'infos' => [...]], ...]
     */
    public function enrichirExercices(array $exercices): array
    {
        $enrichis = [];
        $dejaVus  = []; // cache pour éviter les doublons d'appels API

        foreach ($exercices as $exercice) {
            $nom = strtolower($exercice->getNomExercice());

            if (!isset($dejaVus[$nom])) {
                $dejaVus[$nom] = $this->getInfosExercice($nom);
            }

            $enrichis[] = [
                'exercice' => $exercice,
                'infos'    => $dejaVus[$nom],
            ];
        }

        return $enrichis;
    }

    /**
     * Retourne les muscles les plus travaillés (pour les stats)
     * @return array ['Pectoraux' => 5, 'Biceps' => 3, ...]
     */
    public function getMusclesLesPlusTravailles(array $exercices): array
    {
        $muscleCount = [];

        foreach ($exercices as $exercice) {
            $nom   = strtolower($exercice->getNomExercice());
            $infos = $this->getInfosExercice($nom);
            $muscle = $infos['muscle'] ?? 'Inconnu';
            $muscleCount[$muscle] = ($muscleCount[$muscle] ?? 0) + 1;
        }

        arsort($muscleCount);
        return array_slice($muscleCount, 0, 5, true); // top 5
    }

    // ── Privés ────────────────────────────────────────────────────────────────

    private function traduire(string $nom): string
    {
        $nomLower = strtolower($nom);
        foreach (self::TRADUCTIONS as $fr => $en) {
            if (str_contains($nomLower, $fr)) {
                return $en;
            }
        }
        return $nomLower; // envoie tel quel si pas de traduction
    }

    private function traduireNiveau(string $niveau): string
    {
        return match (strtolower($niveau)) {
            'beginner'     => '🟢 Débutant',
            'intermediate' => '🟡 Intermédiaire',
            'expert'       => '🔴 Expert',
            default        => '⚪ Non défini',
        };
    }

    private function getInfosDefaut(string $nom): array
    {
        // Infos de fallback basées sur des règles simples
        $nomLower = strtolower($nom);

        $muscle = match(true) {
            str_contains($nomLower, 'yoga')        => 'Flexibilité',
            str_contains($nomLower, 'squat')       => 'Quadriceps',
            str_contains($nomLower, 'pompe')       => 'Pectoraux',
            str_contains($nomLower, 'abdo')        => 'Abdominaux',
            str_contains($nomLower, 'planche')     => 'Abdominaux',
            str_contains($nomLower, 'course')      => 'Cardio',
            str_contains($nomLower, 'vélo')        => 'Quadriceps',
            str_contains($nomLower, 'natation')    => 'Corps entier',
            str_contains($nomLower, 'musculation') => 'Muscles variés',
            str_contains($nomLower, 'corde')       => 'Cardio',
            default                                 => 'Non défini',
        };

        return [
            'muscle'              => $muscle,
            'muscles_secondaires' => '',
            'equipment'           => 'Non défini',
            'niveau'              => '⚪ Non défini',
            'gif'                 => null,
            'found'               => false,
        ];
    }
}