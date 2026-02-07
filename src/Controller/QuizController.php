<?php

namespace App\Controller;

use App\Service\QuizService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/quiz')] 
class QuizController extends AbstractController
{
    private QuizService $quizService;

    public function __construct(QuizService $quizService)
    {
        $this->quizService = $quizService;
    }

    #[Route('/quiz', name: 'app_quiz')]
    public function index(): Response
    {
        try {
            // Récupérer les catégories disponibles
            $categories = $this->quizService->getCategories();
            
            // Par défaut, on affiche les questions de la catégorie "Linux" en difficulté "easy"
            $questions = $this->quizService->getQuestions('linux', 10, 'easy');

            return $this->render('quiz/index.html.twig', [
                'questions' => $questions,
                'categories' => $categories,
                'selectedCategory' => 'linux',
                'selectedDifficulty' => 'easy'
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->render('quiz/index.html.twig', [
                'questions' => [],
                'categories' => [],
                'error' => $e->getMessage()
            ]);
        }
    }

    #[Route('/filter', name: 'app_quiz_filter', methods: ['GET'])]
    public function filter(Request $request): Response
    {
        try {
            $category = $request->query->get('category', 'linux');
            $difficulty = $request->query->get('difficulty', 'easy');
            
            $questions = $this->quizService->getQuestions($category, 10, $difficulty);
            $categories = $this->quizService->getCategories();

            return $this->render('quiz/index.html.twig', [
                'questions' => $questions,
                'categories' => $categories,
                'selectedCategory' => $category,
                'selectedDifficulty' => $difficulty
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('app_quiz');
        }
    }

    #[Route('/question/{id}', name: 'app_quiz_question', requirements: ['id' => '\d+'])]
    public function question(int $id): Response
    {
        try {
            // Pour une question spécifique, on récupère d'abord une liste de questions
            // puis on filtre pour obtenir celle qui nous intéresse
            $questions = $this->quizService->getQuestions('', 50, '');
            $question = null;

            foreach ($questions as $q) {
                if ($q['id'] === $id) {
                    $question = $q;
                    break;
                }
            }

            if (!$question) {
                throw new \Exception('Question non trouvée');
            }

            return $this->render('quiz/question.html.twig', [
                'question' => $question
            ]);
        } catch (\Exception $e) {
            $this->addFlash('error', $e->getMessage());
            return $this->redirectToRoute('app_quiz');
        }
    }

    #[Route('/submit', name: 'app_quiz_submit', methods: ['POST'])]
    public function submit(Request $request): Response
    {
        try {
            $answers = $request->request->all('answers');
            $score = 0;
            $total = count($answers);

            // Ici, vous pourriez ajouter une logique pour vérifier les réponses
            // et calculer le score

            $this->addFlash('success', sprintf('Votre score est de %d/%d', $score, $total));
            return $this->redirectToRoute('app_quiz');
        } catch (\Exception $e) {
            $this->addFlash('error', 'Une erreur est survenue lors de la soumission du quiz');
            return $this->redirectToRoute('app_quiz');
        }
    }
}