<?php

namespace App\Controller;

use App\Entity\QuizMental;
use App\Form\QuizMentalType;
use App\Repository\QuizMentalRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/mental')]
class MentalController extends AbstractController
{
    #[Route('', name: 'app_mental')]
    public function index(QuizMentalRepository $quizMentalRepository, \App\Service\WellnessService $wellnessService): Response
    {
        $user = $this->getUser();
        $quote = $wellnessService->getDailyQuote();
        
        // Quiz disponibles créés par admin pour cet utilisateur
        $quizzesDisponibles = $quizMentalRepository->findBy(
            ['utilisateur' => $user, 'statut' => 'disponible'],
            ['dateQuiz' => 'DESC']
        );
        
        // Quiz passés/complétés par l'utilisateur
        $quizzesPasses = $quizMentalRepository->findBy(
            ['utilisateur' => $user, 'statut' => 'complete'],
            ['dateQuiz' => 'DESC']
        );

        $totalScore = 0;
        $medailles = [];
        foreach ($quizzesPasses as $quiz) {
            $totalScore += $quiz->getScoreResultat();
            if ($quiz->getMedailleQuiz()) {
                $medailles[] = $quiz->getMedailleQuiz();
            }
        }

        // Calculer achievements basés sur les quiz réellement passés
        $achievements = [
            'total_quiz' => count($quizzesPasses),
            'has_expert' => in_array('Expert Santé', $medailles),
            'has_connaisseur' => in_array('Connaisseur', $medailles),
            'has_apprenti' => in_array('Apprenti', $medailles),
            'total_medailles' => count(array_unique($medailles)),
        ];

        return $this->render('mental/index.html.twig', [
            'quizzesDisponibles' => $quizzesDisponibles,
            'quizzesPasses' => $quizzesPasses,
            'totalScore' => $totalScore,
            'achievements' => $achievements,
            'quote' => $quote,
        ]);
    }

    #[Route('/search', name: 'app_mental_search', methods: ['GET'])]
    public function search(Request $request, QuizMentalRepository $quizMentalRepository): JsonResponse
    {
        $user = $this->getUser();
        $searchTerm = $request->query->get('search', '');
        $sortBy = $request->query->get('sort', 'date'); // 'date' ou 'name'
        $quizType = $request->query->get('type', 'disponibles'); // 'disponibles' ou 'passes'

        $statut = $quizType === 'passes' ? 'complete' : 'disponible';
        
        // Récupérer les quiz filtrés
        $quizzes = $quizMentalRepository->findBy(
            ['utilisateur' => $user, 'statut' => $statut]
        );

        // Filtrer par recherche
        if ($searchTerm) {
            $quizzes = array_filter($quizzes, function($quiz) use ($searchTerm) {
                return stripos($quiz->getTitre(), $searchTerm) !== false;
            });
        }

        // Trier
        usort($quizzes, function($a, $b) use ($sortBy) {
            if ($sortBy === 'name') {
                return strcasecmp($a->getTitre(), $b->getTitre());
            } else {
                // Tri par date décroissant
                return $b->getDateQuiz()->getTimestamp() - $a->getDateQuiz()->getTimestamp();
            }
        });

        // Construire les données de réponse
        $data = [];
        foreach ($quizzes as $quiz) {
            $data[] = [
                'id' => $quiz->getId(),
                'titre' => $quiz->getTitre(),
                'niveauStressCible' => $quiz->getNiveauStressCible(),
                'questionsCount' => count($quiz->getQuestions()),
                'scoreResultat' => $quiz->getScoreResultat(),
                'medailleQuiz' => $quiz->getMedailleQuiz(),
                'dateQuiz' => $quiz->getDateQuiz()->format('d/m/Y à H:i'),
                'dateQuizTimestamp' => $quiz->getDateQuiz()->getTimestamp(),
                'dateQuizFormatted' => $quiz->getDateQuiz()->format('d/m/Y'),
            ];
        }

        return new JsonResponse([
            'success' => true,
            'quizzes' => $data,
            'count' => count($data),
        ]);
    }

    #[Route('/new', name: 'app_mental_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $quiz = new QuizMental();
        $quiz->setUtilisateur($this->getUser());

        $form = $this->createForm(QuizMentalType::class, $quiz);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($quiz);
            $entityManager->flush();

            $this->addFlash('success', 'Quiz cree avec succes!');
            return $this->redirectToRoute('app_mental');
        }

        return $this->render('mental/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_mental_show', methods: ['GET'])]
    public function show(QuizMental $quiz): Response
    {
        if ($quiz->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('mental/show.html.twig', [
            'quiz' => $quiz,
        ]);
    }

    #[Route('/{id}/delete', name: 'app_mental_delete', methods: ['POST'])]
    public function delete(Request $request, QuizMental $quiz, EntityManagerInterface $entityManager): Response
    {
        if ($quiz->getUtilisateur() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        if ($this->isCsrfTokenValid('delete'.$quiz->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($quiz);
            $entityManager->flush();
            $this->addFlash('success', 'Quiz supprime!');
        }

        return $this->redirectToRoute('app_mental');
    }

    #[Route('/quiz/start/{quizId}', name: 'app_mental_quiz_start')]
    public function quizStart(int $quizId, Request $request, EntityManagerInterface $em): Response
    {
        // Récupérer le quiz spécifique
        $quiz = $em->getRepository(QuizMental::class)->find($quizId);
        
        if (!$quiz) {
            $this->addFlash('error', 'Quiz introuvable.');
            return $this->redirectToRoute('app_mental');
        }
        
        // Vérifier que le quiz appartient bien à l'utilisateur
        if ($quiz->getUtilisateur() !== $this->getUser()) {
            $this->addFlash('error', 'Vous n\'avez pas accès à ce quiz.');
            return $this->redirectToRoute('app_mental');
        }
        
        // Vérifier que le quiz est disponible (pas déjà passé)
        if ($quiz->getStatut() === 'complete') {
            $this->addFlash('warning', 'Vous avez déjà passé ce quiz.');
            return $this->redirectToRoute('app_mental');
        }
        
        // Récupérer TOUTES les questions disponibles du pool commun
        $questions = $em->getRepository(\App\Entity\Question::class)->findAll();
        
        if (empty($questions)) {
            $this->addFlash('warning', 'Aucune question disponible dans le pool.');
            return $this->redirectToRoute('app_mental');
        }

        // Mélanger les questions et prendre les 5 premières
        shuffle($questions);
        $questions = array_slice($questions, 0, min(5, count($questions)));
        
        // Stocker les IDs des questions en session
        $questionIds = array_map(fn($q) => $q->getId(), $questions);
        $request->getSession()->set('quiz_id', $quizId);
        $request->getSession()->set('quiz_question_ids', $questionIds);
        $request->getSession()->set('quiz_current_index', 0);
        $request->getSession()->set('quiz_answers', []);
        $request->getSession()->set('quiz_start_time', time());

        return $this->redirectToRoute('app_mental_quiz_question');
    }

    #[Route('/quiz/question', name: 'app_mental_quiz_question')]
    public function quizQuestion(Request $request, EntityManagerInterface $em): Response
    {
        $session = $request->getSession();
        $questionIds = $session->get('quiz_question_ids', []);
        $currentIndex = $session->get('quiz_current_index', 0);

        if (empty($questionIds) || $currentIndex >= count($questionIds)) {
            return $this->redirectToRoute('app_mental_quiz_result');
        }

        $question = $em->getRepository(\App\Entity\Question::class)->find($questionIds[$currentIndex]);
        
        if (!$question) {
            return $this->redirectToRoute('app_mental');
        }

        // Gérer la soumission de la réponse
        if ($request->isMethod('POST')) {
            $answer = $request->request->get('answer');
            $timeSpent = (float) $request->request->get('time_spent', 0); // Temps en secondes
            
            $answers = $session->get('quiz_answers', []);
            $answers[$currentIndex] = [
                'question_id' => $question->getId(),
                'answer' => $answer,
                'correct' => $answer === $question->getReponseCorrecte(),
                'points' => $answer === $question->getReponseCorrecte() ? $question->getPointsValeur() : 0,
                'time_spent' => $timeSpent,
            ];
            $session->set('quiz_answers', $answers);
            $session->set('quiz_current_index', $currentIndex + 1);

            return $this->redirectToRoute('app_mental_quiz_question');
        }

        $totalQuestions = count($questionIds);

        return $this->render('mental/quiz/question.html.twig', [
            'question' => $question,
            'currentIndex' => $currentIndex,
            'totalQuestions' => $totalQuestions,
            'progress' => round(($currentIndex / $totalQuestions) * 100),
        ]);
    }

    #[Route('/quiz/result', name: 'app_mental_quiz_result')]
    public function quizResult(
        Request $request, 
        EntityManagerInterface $em,
        \App\Service\CognitiveInsightService $insightService
    ): Response
    {
        $session = $request->getSession();
        $answers = $session->get('quiz_answers', []);
        $quizId = $session->get('quiz_id');
        
        if (empty($answers) || !$quizId) {
            return $this->redirectToRoute('app_mental');
        }

        $user = $this->getUser();
        /** @var \App\Entity\Utilisateur $user */
        
        // Optionnel : Générer un insight si c'est le 3ème quiz par exemple
        // Pour la démo, on le fait à chaque fois
        $insightService->generateInsightForUser($user);

        // Calculer le score
        $totalScore = array_sum(array_column($answers, 'points'));
        $correctAnswers = count(array_filter($answers, fn($a) => $a['correct']));
        $totalQuestions = count($answers);
        $percentage = round(($correctAnswers / $totalQuestions) * 100);

        // Attribuer médaille selon le score
        $medaille = null;
        if ($percentage >= 80) {
            $medaille = 'Expert Santé';
        } elseif ($percentage >= 60) {
            $medaille = 'Connaisseur';
        } elseif ($percentage >= 40) {
            $medaille = 'Apprenti';
        }

        // Calculer les métriques de performance
        $times = array_column($answers, 'time_spent');
        $averageTime = !empty($times) ? array_sum($times) / count($times) : 0;
        
        $agilite = 'Normal';
        if ($averageTime < 5) {
            $agilite = 'Rapide - Connecté';
        } elseif ($averageTime > 20) {
            $agilite = 'Analytique / Lent';
        }

        // Mettre à jour le quiz existant avec le résultat
        $quiz = $em->getRepository(QuizMental::class)->find($quizId);
        if (!$quiz) {
            $this->addFlash('error', 'Quiz introuvable.');
            return $this->redirectToRoute('app_mental');
        }

        $quiz->setScoreResultat($totalScore);
        $quiz->setMedailleQuiz($medaille);
        $quiz->setStatut('complete');
        $quiz->setDateQuiz(new \DateTime()); // Date de complétion
        $quiz->setTempsMoyenReponse($averageTime);
        $quiz->setAgiliteCognitive($agilite);

        $em->flush();

        // Nettoyer la session
        $session->remove('quiz_id');
        $session->remove('quiz_question_ids');
        $session->remove('quiz_current_index');
        $session->remove('quiz_answers');
        $session->remove('quiz_start_time');

        return $this->render('mental/quiz/result.html.twig', [
            'totalScore' => $totalScore,
            'correctAnswers' => $correctAnswers,
            'totalQuestions' => $totalQuestions,
            'percentage' => $percentage,
            'medaille' => $medaille,
            'quiz' => $quiz,
        ]);
    }
}
