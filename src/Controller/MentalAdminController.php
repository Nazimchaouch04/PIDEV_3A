<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\QuizMental;
use App\Repository\QuestionRepository;
use App\Service\MistralService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/bo/mental')]
class MentalAdminController extends AbstractController
{
    #[Route('', name: 'app_mental_admin_dashboard')]
    public function dashboard(
        QuestionRepository $questionRepository,
        EntityManagerInterface $em
    ): Response {
        // Vérification manuelle pour autoriser les spécialistes ET les admins
        if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_SPECIALISTE')) {
            throw $this->createAccessDeniedException('Accès réservé aux administrateurs et spécialistes.');
        }
        
        $totalQuestions = $questionRepository->count([]);
        $totalQuizzes = $em->getRepository(QuizMental::class)->count([]);
        $totalUsers = $em->getRepository(\App\Entity\Utilisateur::class)->count([]);
        $totalMedailles = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->select('COUNT(q.id)')
            ->where('q.medailleQuiz IS NOT NULL')
            ->getQuery()
            ->getSingleScalarResult();

        $avgResponseTime = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->select('AVG(q.tempsMoyenReponse)')
            ->where('q.statut = :statut')
            ->setParameter('statut', 'complete')
            ->getQuery()
            ->getSingleScalarResult();

        $agilityDistribution = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->select('q.agiliteCognitive, COUNT(q.id) as count')
            ->where('q.statut = :statut')
            ->andWhere('q.agiliteCognitive IS NOT NULL')
            ->setParameter('statut', 'complete')
            ->groupBy('q.agiliteCognitive')
            ->getQuery()
            ->getResult();

        $recentQuestions = $questionRepository->findBy([], ['id' => 'DESC'], 5);

        return $this->render('bo/mental/dashboard.html.twig', [
            'totalQuestions' => $totalQuestions,
            'totalQuizzes' => $totalQuizzes,
            'totalUsers' => $totalUsers,
            'totalMedailles' => $totalMedailles,
            'recentQuestions' => $recentQuestions,
            'avgResponseTime' => round($avgResponseTime ?? 0, 1),
            'agilityDistribution' => $agilityDistribution,
        ]);
    }

    #[Route('/questions', name: 'app_mental_admin_questions')]
    public function listQuestions(QuestionRepository $questionRepository): Response
    {
        $questions = $questionRepository->findAll();

        return $this->render('bo/mental/questions/list.html.twig', [
            'questions' => $questions,
        ]);
    }

    #[Route('/questions/ajax', name: 'app_mental_admin_questions_ajax')]
    public function listQuestionsAjax(Request $request, QuestionRepository $questionRepository): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'id-desc');
        
        // Construire la requête
        $qb = $questionRepository->createQueryBuilder('q');
        
        // Ajouter la recherche si présente
        if (!empty($search)) {
            $qb->where('q.enonce LIKE :search')
               ->orWhere('q.reponseCorrecte LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        
        // Gérer le tri
        [$sortField, $sortOrder] = explode('-', $sort);
        $sortField = match($sortField) {
            'enonce' => 'q.enonce',
            'points' => 'q.pointsValeur',
            'id' => 'q.id',
            default => 'q.id'
        };
        
        $qb->orderBy($sortField, $sortOrder);
        
        $questions = $qb->getQuery()->getResult();
        
        // Générer le HTML pour le tableau
        $html = $this->renderView('bo/mental/questions/_table.html.twig', [
            'questions' => $questions,
        ]);
        
        return $this->json([
            'success' => true,
            'html' => $html,
            'count' => count($questions)
        ]);
    }

    #[Route('/quiz', name: 'app_mental_admin_quiz_list')]
    public function listQuizzes(EntityManagerInterface $em): Response
    {
        $quizzes = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->leftJoin('q.utilisateur', 'u')
            ->addSelect('u')
            ->orderBy('q.dateQuiz', 'DESC')
            ->getQuery()
            ->getResult();

        return $this->render('bo/mental/quiz/list.html.twig', [
            'quizzes' => $quizzes,
        ]);
    }

    #[Route('/quiz/ajax', name: 'app_mental_admin_quiz_ajax')]
    public function listQuizzesAjax(Request $request, EntityManagerInterface $em): Response
    {
        $search = $request->query->get('search', '');
        $sort = $request->query->get('sort', 'id-desc');
        
        // Construire la requête
        $qb = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->leftJoin('q.utilisateur', 'u')
            ->addSelect('u');
        
        // Ajouter la recherche si présente
        if (!empty($search)) {
            $qb->where('q.titre LIKE :search')
               ->orWhere('u.nomComplet LIKE :search')
               ->orWhere('u.email LIKE :search')
               ->setParameter('search', '%' . $search . '%');
        }
        
        // Gérer le tri
        [$sortField, $sortOrder] = explode('-', $sort);
        $sortField = match($sortField) {
            'id' => 'q.id',
            'utilisateur' => 'u.nomComplet',
            'titre' => 'q.titre',
            default => 'q.id'
        };
        
        $qb->orderBy($sortField, $sortOrder);
        
        $quizzes = $qb->getQuery()->getResult();
        
        // Générer le HTML pour le tableau
        $html = $this->renderView('bo/mental/quiz/_table.html.twig', [
            'quizzes' => $quizzes,
        ]);
        
        return $this->json([
            'success' => true,
            'html' => $html,
            'count' => count($quizzes)
        ]);
    }

    #[Route('/quiz/new', name: 'app_mental_admin_quiz_new')]
    public function newQuiz(Request $request, EntityManagerInterface $em): Response
    {
        $quiz = new QuizMental();
        
        if ($request->isMethod('POST')) {
            $quiz->setTitre($request->request->get('titre'));
            $quiz->setNiveauStressCible((int) $request->request->get('niveau_stress'));
            $quiz->setScoreResultat((int) $request->request->get('score', 0));
            $quiz->setMedailleQuiz($request->request->get('medaille'));
            $quiz->setDateQuiz(new \DateTime($request->request->get('date_quiz') ?: 'now'));
            $quiz->setStatut('disponible'); // Quiz disponible par défaut
            
            // Utilisateur
            $userId = $request->request->get('utilisateur_id');
            $utilisateur = $em->getRepository(\App\Entity\Utilisateur::class)->find($userId);
            if ($utilisateur) {
                $quiz->setUtilisateur($utilisateur);
            } else {
                $quiz->setUtilisateur($this->getUser());
            }
            
            $em->persist($quiz);
            $em->flush();

            $this->addFlash('success', 'Quiz créé avec succès et disponible pour l\'utilisateur !');
            return $this->redirectToRoute('app_mental_admin_quiz_list');
        }

        $utilisateurs = $em->getRepository(\App\Entity\Utilisateur::class)->findAll();

        return $this->render('bo/mental/quiz/form.html.twig', [
            'quiz' => $quiz,
            'utilisateurs' => $utilisateurs,
            'isEdit' => false,
        ]);
    }

    #[Route('/quiz/{id}/edit', name: 'app_mental_admin_quiz_edit')]
    public function editQuiz(QuizMental $quiz, Request $request, EntityManagerInterface $em): Response
    {
        if ($request->isMethod('POST')) {
            $quiz->setTitre($request->request->get('titre'));
            $quiz->setNiveauStressCible((int) $request->request->get('niveau_stress'));
            $quiz->setScoreResultat((int) $request->request->get('score'));
            $quiz->setMedailleQuiz($request->request->get('medaille') ?: null);
            $quiz->setDateQuiz(new \DateTime($request->request->get('date_quiz')));
            
            // Utilisateur
            $userId = $request->request->get('utilisateur_id');
            $utilisateur = $em->getRepository(\App\Entity\Utilisateur::class)->find($userId);
            if ($utilisateur) {
                $quiz->setUtilisateur($utilisateur);
            }

            $em->flush();

            $this->addFlash('success', 'Quiz modifié avec succès !');
            return $this->redirectToRoute('app_mental_admin_quiz_list');
        }

        $utilisateurs = $em->getRepository(\App\Entity\Utilisateur::class)->findAll();

        return $this->render('bo/mental/quiz/form.html.twig', [
            'quiz' => $quiz,
            'utilisateurs' => $utilisateurs,
            'isEdit' => true,
        ]);
    }

    #[Route('/quiz/{id}/delete', name: 'app_mental_admin_quiz_delete', methods: ['POST'])]
    public function deleteQuiz(QuizMental $quiz, EntityManagerInterface $em): Response
    {
        $em->remove($quiz);
        $em->flush();

        $this->addFlash('success', 'Quiz supprimé avec succès !');
        return $this->redirectToRoute('app_mental_admin_quiz_list');
    }

    #[Route('/questions/new', name: 'app_mental_admin_question_new')]
    public function newQuestion(Request $request, EntityManagerInterface $em, MistralService $mistralService): Response
    {
        $question = new Question();

        if ($request->isMethod('POST')) {
            $question->setEnonce($request->request->get('enonce'));
            $question->setReponseCorrecte($request->request->get('reponse_correcte'));
            
            // Options fausses séparées par |
            $optionsFausses = [
                $request->request->get('option_1'),
                $request->request->get('option_2'),
                $request->request->get('option_3'),
            ];
            $question->setOptionsFaussesFromArray(array_filter($optionsFausses));
            
            $question->setPointsValeur((int) $request->request->get('points_valeur'));

            // Validation des champs
            $errors = [];
            if (empty($question->getEnonce())) {
                $errors[] = 'L\'énoncé de la question est obligatoire.';
            }
            if (empty($question->getReponseCorrecte())) {
                $errors[] = 'La réponse correcte est obligatoire.';
            }
            if (count($question->getOptionsFaussesArray()) < 2) {
                $errors[] = 'Au moins 2 options fausses sont requises.';
            }
            if ($question->getPointsValeur() <= 0) {
                $errors[] = 'La valeur en points doit être supérieure à 0.';
            }

            if (!empty($errors)) {
                return $this->render('bo/mental/questions/form.html.twig', [
                    'question' => $question,
                    'isEdit' => false,
                    'errors' => $errors,
                    'mistral_configured' => $mistralService->isConfigured(),
                ]);
            }

            // Créer un quiz par défaut ou lier à un quiz existant
            $quiz = $em->getRepository(QuizMental::class)->findOneBy(['titre' => 'Question Bank']) 
                    ?? (new QuizMental())
                        ->setTitre('Question Bank')
                        ->setNiveauStressCible(5)
                        ->setUtilisateur($this->getUser());
            
            $question->setQuiz($quiz);
            $em->persist($quiz);
            $em->persist($question);
            $em->flush();

            $this->addFlash('success', 'Question créée avec succès !');
            return $this->redirectToRoute('app_mental_admin_questions');
        }

        return $this->render('bo/mental/questions/form.html.twig', [
            'question' => $question,
            'isEdit' => false,
            'mistral_configured' => $mistralService->isConfigured(),
        ]);
    }

        #[Route('/questions/generate-mistral', name: 'app_mental_admin_generate_mistral', methods: ['POST'])]
    public function generateQuestionWithMistral(MistralService $mistralService): JsonResponse
    {
        // Rendre cette route complètement publique pour les tests
        // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_ANONYMOUSLY');
        
        try {
            // Journalisation pour diagnostiquer
            error_log('Mistral API - Début de génération');
            
            if (!$mistralService->isConfigured()) {
                error_log('Mistral API - Non configurée');
                return new JsonResponse([
                    'success' => false,
                    'error' => 'L\'API Mistral n\'est pas configurée. Veuillez configurer votre clé API.'
                ], 400);
            }

            error_log('Mistral API - Service configuré, tentative de génération');
            $questionData = $mistralService->generateQuizQuestion();

            if (!$questionData) {
                error_log('Mistral API - Échec de génération');
                return new JsonResponse([
                    'success' => false,
                    'error' => 'Impossible de générer une question. Veuillez réessayer.'
                ], 500);
            }

            error_log('Mistral API - Succès: ' . json_encode($questionData));
            
            return new JsonResponse([
                'success' => true,
                'data' => $questionData
            ]);

        } catch (\Exception $e) {
            error_log('Mistral API - Exception: ' . $e->getMessage());
            return new JsonResponse([
                'success' => false,
                'error' => 'Erreur lors de la génération: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/questions/{id}/edit', name: 'app_mental_admin_question_edit')]
    public function editQuestion(Question $question, Request $request, EntityManagerInterface $em, MistralService $mistralService): Response
    {
        if ($request->isMethod('POST')) {
            $question->setEnonce($request->request->get('enonce'));
            $question->setReponseCorrecte($request->request->get('reponse_correcte'));
            
            $optionsFausses = [
                $request->request->get('option_1'),
                $request->request->get('option_2'),
                $request->request->get('option_3'),
            ];
            $question->setOptionsFaussesFromArray(array_filter($optionsFausses));
            
            $question->setPointsValeur((int) $request->request->get('points_valeur'));

            $em->flush();

            $this->addFlash('success', 'Question modifiée avec succès !');
            return $this->redirectToRoute('app_mental_admin_questions');
        }

        return $this->render('bo/mental/questions/form.html.twig', [
            'question' => $question,
            'isEdit' => true,
            'mistral_configured' => $mistralService->isConfigured(),
        ]);
    }

    #[Route('/questions/{id}/delete', name: 'app_mental_admin_question_delete', methods: ['POST'])]
    public function deleteQuestion(Question $question, EntityManagerInterface $em): Response
    {
        $em->remove($question);
        $em->flush();

        $this->addFlash('success', 'Question supprimée avec succès !');
        return $this->redirectToRoute('app_mental_admin_questions');
    }

    #[Route('/quiz/export-pdf', name: 'app_mental_admin_quiz_export_pdf')]
    public function exportQuizPdf(EntityManagerInterface $em): Response
    {
        // Récupérer tous les quiz avec leurs utilisateurs et questions
        $quizzes = $em->getRepository(QuizMental::class)
            ->createQueryBuilder('q')
            ->leftJoin('q.utilisateur', 'u')
            ->leftJoin('q.questions', 'qs')
            ->addSelect('q', 'u', 'COUNT(qs.id) as nbQuestions')
            ->groupBy('q.id', 'u.id')
            ->orderBy('q.dateQuiz', 'DESC')
            ->getQuery()
            ->getResult();
        
        // Transformer le résultat pour avoir accès à nbQuestions comme propriété
        $formattedQuizzes = [];
        foreach ($quizzes as $quizData) {
            $quiz = $quizData[0] ?? null;
            $utilisateur = $quizData[1] ?? null;
            
            if ($quiz && $utilisateur) {
                $formattedQuizzes[] = (object) [
                    'id' => $quiz->getId(),
                    'titre' => $quiz->getTitre(),
                    'dateQuiz' => $quiz->getDateQuiz(),
                    'niveauStressCible' => $quiz->getNiveauStressCible(),
                    'scoreResultat' => $quiz->getScoreResultat(),
                    'medailleQuiz' => $quiz->getMedailleQuiz(),
                    'statut' => $quiz->getStatut(),
                    'utilisateur' => $utilisateur,
                    'nbQuestions' => $quizData['nbQuestions'] ?? 0,
                ];
            }
        }

        // Configuration DomPDF
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isRemoteEnabled', true);
        $options->set('isJavascriptEnabled', true);

        // Créer le HTML
        $html = $this->renderView('bo/mental/quiz/export_pdf.html.twig', [
            'quizzes' => $formattedQuizzes,
            'dateExport' => new \DateTime(),
        ]);

        // Générer le PDF
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Nom du fichier
        $filename = 'quiz_mental_export_' . date('Y-m-d_H-i-s') . '.pdf';

        // Response PDF
        $response = new Response($dompdf->output());
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');
        $response->headers->set('Cache-Control', 'private, max-age=0, must-revalidate');
        $response->headers->set('Pragma', 'no-cache');
        $response->headers->set('Expires', '0');

        return $response;
    }
}
