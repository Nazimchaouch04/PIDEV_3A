<?php

namespace App\Controller;

use App\Service\MentalAIService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

#[Route('/mental-ai')]
class MentalAIController extends AbstractController
{
    public function __construct(
        private MentalAIService $mentalAIService,
        private EntityManagerInterface $em
    ) {}

    #[Route('', name: 'app_mental_ai_dashboard')]
    public function dashboard(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Récupérer les données pour l'IA
        $fatigueAnalysis = $this->mentalAIService->getFatigueAnalysis($user);
        $performancePrediction = $this->mentalAIService->getPerformancePrediction($user);
        $apiAvailable = $this->mentalAIService->isApiAvailable();

        return $this->render('mental_ai/dashboard.html.twig', [
            'fatigueAnalysis' => $fatigueAnalysis,
            'performancePrediction' => $performancePrediction,
            'apiAvailable' => $apiAvailable
        ]);
    }

    #[Route('/checkin', name: 'app_mental_ai_checkin')]
    public function checkin(): Response
    {
        $user = $this->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('mental_ai/checkin.html.twig');
    }

    #[Route('/coach-advice', name: 'app_mental_ai_coach_advice', methods: ['POST'])]
    public function getCoachAdvice(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Utilisateur non connecté'], 401);
        }

        $checkinText = $request->request->get('checkin_text');
        if (empty($checkinText)) {
            return new JsonResponse(['error' => 'Message requis'], 400);
        }

        try {
            $advice = $this->mentalAIService->getCoachAdvice($user, $checkinText);
            return new JsonResponse([
                'success' => true,
                'advice' => $advice
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'Erreur lors de la génération du conseil'
            ], 500);
        }
    }

    #[Route('/analyze-fatigue', name: 'app_mental_ai_analyze_fatigue', methods: ['POST'])]
    public function analyzeFatigue(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Utilisateur non connecté'], 401);
        }

        $timings = $request->request->get('timings', []);
        if (empty($timings)) {
            return new JsonResponse(['error' => 'Timings requis'], 400);
        }

        try {
            $analysis = $this->mentalAIService->getFatigueAnalysis($user);
            return new JsonResponse([
                'success' => true,
                'analysis' => $analysis
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'Erreur lors de l\'analyse'
            ], 500);
        }
    }

    #[Route('/predict-performance', name: 'app_mental_ai_predict_performance', methods: ['POST'])]
    public function predictPerformance(Request $request): JsonResponse
    {
        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['error' => 'Utilisateur non connecté'], 401);
        }

        try {
            $prediction = $this->mentalAIService->getPerformancePrediction($user);
            return new JsonResponse([
                'success' => true,
                'prediction' => $prediction
            ]);
        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'Erreur lors de la prédiction'
            ], 500);
        }
    }
}
