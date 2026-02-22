<?php

namespace App\Service;

use App\Entity\CognitiveInsight;
use App\Entity\Utilisateur;
use App\Entity\QuizMental;
use Doctrine\ORM\EntityManagerInterface;

class CognitiveInsightService
{
    public function __construct(
        private MistralService $mistralService,
        private EntityManagerInterface $entityManager
    ) {}

    public function generateInsightForUser(Utilisateur $utilisateur): ?CognitiveInsight
    {
        $quizzes = $utilisateur->getQuizMentaux();
        if ($quizzes->isEmpty()) {
            return null;
        }

        // Préparer les données pour Mistral
        $history = [];
        foreach ($quizzes as $quiz) {
            /** @var QuizMental $quiz */
            $history[] = [
                'date' => $quiz->getDateQuiz()->format('Y-m-d'),
                'score' => $quiz->getScoreResultat(),
                'stress_cible' => $quiz->getNiveauStressCible(),
                'temps_reponse' => $quiz->getTempsMoyenReponse(),
            ];
        }

        $prompt = "En tant qu'assistant en psychologie cognitive, analyse l'historique de quiz suivant d'un utilisateur et fournis une analyse comportementale détaillée.
        
        Historique: " . json_encode($history) . "
        
        Ta réponse doit être au format JSON:
        {
            \"analyse\": \"Texte détaillé de l'analyse (max 500 mots)\",
            \"humeur_predite\": \"Calme/Anxieux/Stressé/Enjoué\",
            \"scores_evolution\": [tableau de nombres représentant la tendance de bien-être sur 10]
        }";

        try {
            // On détourne la méthode de MistralService pour envoyer un prompt personnalisé
            // On devrait idéalement ajouter une méthode générique à MistralService
            $response = $this->callMistralCustom($prompt);
            
            if ($response) {
                $insight = new CognitiveInsight();
                $insight->setUtilisateur($utilisateur);
                $insight->setAnalyse($response['analyse']);
                $insight->setHumeurPredite($response['humeur_predite']);
                $insight->setScoresEvolution($response['scores_evolution']);
                
                $this->entityManager->persist($insight);
                $this->entityManager->flush();
                
                return $insight;
            }
        } catch (\Exception $e) {
            error_log("Error generating cognitive insight: " . $e->getMessage());
        }

        return null;
    }

    private function callMistralCustom(string $prompt): ?array
    {
        // On utilise la structure de MistralService mais avec un prompt différent
        // On va tricher un peu en utilisant une réflexion ou en modifiant MistralService
        // Pour cet exemple, je suppose que je modifie MistralService pour accepter des prompts
        return $this->mistralService->generateCustomResponse($prompt);
    }
}
