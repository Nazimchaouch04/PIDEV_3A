<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;

class AIController extends AbstractController
{
    private ParameterBagInterface $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    #[Route('/api/ai/triage', name: 'ai_triage', methods: ['POST'])]
    public function triageAnalysis(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['reason']) || !isset($data['patientHistory'])) {
            return new JsonResponse(['error' => 'Missing required fields: reason, patientHistory'], 400);
        }

        try {
            $projectDir = $this->parameterBag->get('kernel.project_dir');
            $process = new Process(['python', $projectDir . '/ai_services/triage_system.py', 
                                   $data['reason'], $data['patientHistory']]);
            $process->setWorkingDirectory($projectDir);
            $process->run();

            if (!$process->isSuccessful()) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'AI service process failed: ' . $process->getErrorOutput()
                ], 500);
            }

            $output = $process->getOutput();
            // Convert to UTF-8 if needed
            if (!mb_check_encoding($output, 'UTF-8')) {
                $output = mb_convert_encoding($output, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
            }
            
            $result = json_decode($output, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'Invalid JSON response from AI service: ' . json_last_error_msg() . '. Output: ' . $output
                ], 500);
            }
            
            // Enhanced response with additional context
            return new JsonResponse([
                'success' => true,
                'data' => $result,
                'enhanced_features' => [
                    'nlp_processing' => true,
                    'vital_signs_detection' => isset($result['vital_signs']),
                    'keyword_extraction' => isset($result['extracted_keywords']),
                    'text_complexity' => isset($result['text_complexity'])
                ]
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'AI service unavailable: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/api/ai/prescription', name: 'ai_prescription', methods: ['POST'])]
    public function prescriptionSuggestions(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['symptoms']) || !isset($data['consultationReason'])) {
            return new JsonResponse(['error' => 'Missing required fields: symptoms, consultationReason'], 400);
        }

        try {
            $projectDir = $this->parameterBag->get('kernel.project_dir');
            $process = new Process(['python', $projectDir . '/ai_services/prescription_suggester.py', 
                                   $data['symptoms'], $data['consultationReason']]);
            $process->setWorkingDirectory($projectDir);
            $process->run();

            if (!$process->isSuccessful()) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'AI service process failed: ' . $process->getErrorOutput()
                ], 500);
            }

            $output = $process->getOutput();
            // Convert to UTF-8 if needed
            if (!mb_check_encoding($output, 'UTF-8')) {
                $output = mb_convert_encoding($output, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
            }
            
            $result = json_decode($output, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'Invalid JSON response from AI service: ' . json_last_error_msg() . '. Output: ' . $output
                ], 500);
            }
            
            return new JsonResponse([
                'success' => true,
                'data' => $result,
                'enhanced_features' => [
                    'nlp_processing' => true,
                    'vital_signs_context' => isset($result['vital_signs']),
                    'keyword_extraction' => isset($result['extracted_keywords']),
                    'match_strength' => isset($result['keyword_matches'])
                ]
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'AI service unavailable: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/api/ai/summary', name: 'ai_summary', methods: ['POST'])]
    public function consultationSummary(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['notes'])) {
            return new JsonResponse(['error' => 'Missing required field: notes'], 400);
        }

        try {
            $projectDir = $this->parameterBag->get('kernel.project_dir');
            $process = new Process(['python', $projectDir . '/ai_services/consultation_summarizer.py', 
                                   $data['notes']]);
            $process->setWorkingDirectory($projectDir);
            $process->run();

            if (!$process->isSuccessful()) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'AI service process failed: ' . $process->getErrorOutput()
                ], 500);
            }

            $output = $process->getOutput();
            // Convert to UTF-8 if needed
            if (!mb_check_encoding($output, 'UTF-8')) {
                $output = mb_convert_encoding($output, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
            }
            
            $result = json_decode($output, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'Invalid JSON response from AI service: ' . json_last_error_msg() . '. Output: ' . $output
                ], 500);
            }
            
            return new JsonResponse([
                'success' => true,
                'data' => $result,
                'enhanced_features' => [
                    'nlp_processing' => true,
                    'medical_normalization' => true,
                    'keyword_extraction' => isset($result['extracted_keywords']),
                    'text_complexity' => isset($result['text_complexity']),
                    'vital_signs_detection' => isset($result['vital_signs'])
                ]
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'AI service unavailable: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/api/ai/recommandations', name: 'ai_recommandations', methods: ['POST'])]
    public function generateRecommandations(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['symptoms']) || !isset($data['diagnostic'])) {
            return new JsonResponse(['error' => 'Missing required fields: symptoms, diagnostic'], 400);
        }

        try {
            $projectDir = $this->parameterBag->get('kernel.project_dir');
            $process = new Process(['python', $projectDir . '/ai_services/recommendation_generator.py', 
                                   $data['symptoms'], $data['diagnostic']]);
            $process->setWorkingDirectory($projectDir);
            $process->run();

            if (!$process->isSuccessful()) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'AI service process failed: ' . $process->getErrorOutput()
                ], 500);
            }

            $output = $process->getOutput();
            // Convert to UTF-8 if needed
            if (!mb_check_encoding($output, 'UTF-8')) {
                $output = mb_convert_encoding($output, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
            }
            
            $result = json_decode($output, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'Invalid JSON response from AI service: ' . json_last_error_msg() . '. Output: ' . $output
                ], 500);
            }

            return new JsonResponse([
                'success' => true,
                'data' => $result,
                'enhanced_features' => [
                    'contextual_analysis' => true,
                    'personalized_recommendations' => isset($result['personalized']),
                    'evidence_based' => isset($result['evidence_level'])
                ]
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'AI service unavailable: ' . $e->getMessage()
            ], 500);
        }
    }

    #[Route('/api/ai/predict-emergency', name: 'ai_predict_emergency', methods: ['POST'])]
    public function predictEmergency(Request $request, RendezVousRepository $rendezVousRepository, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        
        if (!isset($data['reason']) || !isset($data['rendezVousId'])) {
            return new JsonResponse(['error' => 'Missing required fields: reason, rendezVousId'], 400);
        }

        try {
            $projectDir = $this->parameterBag->get('kernel.project_dir');
            $process = new Process(['python', $projectDir . '/ai_services/triage_system.py', 
                                   $data['reason'], 'Emergency assessment']);
            $process->setWorkingDirectory($projectDir);
            $process->run();

            if (!$process->isSuccessful()) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'AI service process failed: ' . $process->getErrorOutput()
                ], 500);
            }

            $output = $process->getOutput();
            // Convert to UTF-8 if needed
            if (!mb_check_encoding($output, 'UTF-8')) {
                $output = mb_convert_encoding($output, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
            }
            
            $result = json_decode($output, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return new JsonResponse([
                    'success' => false,
                    'error' => 'Invalid JSON response from AI service: ' . json_last_error_msg() . '. Output: ' . $output
                ], 500);
            }

            // Calculate emergency level (1-10 scale) based on triage results
            $emergencyLevel = $this->calculateEmergencyLevel($result);
            
            // Update the rendez-vous with emergency level
            $rendezVous = $rendezVousRepository->find($data['rendezVousId']);
            if ($rendezVous && $rendezVous->getPatient() === $this->getUser()) {
                $rendezVous->setNiveauUrgence($emergencyLevel);
                $em->flush();
            }

            return new JsonResponse([
                'success' => true,
                'emergencyLevel' => $emergencyLevel,
                'triageData' => $result,
                'message' => $this->getEmergencyMessage($emergencyLevel)
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'success' => false,
                'error' => 'AI service unavailable: ' . $e->getMessage()
            ], 500);
        }
    }

    private function calculateEmergencyLevel(array $triageResult): int
    {
        $level = 1; // Base level
        
        // Increase based on severity indicators
        if (isset($triageResult['severity'])) {
            $level += min($triageResult['severity'], 4);
        }
        
        if (isset($triageResult['urgency_indicators']) && is_array($triageResult['urgency_indicators'])) {
            $level += count($triageResult['urgency_indicators']);
        }
        
        if (isset($triageResult['risk_factors']) && is_array($triageResult['risk_factors'])) {
            $level += min(count($triageResult['risk_factors']), 2);
        }
        
        return min($level, 10); // Cap at 10
    }

    private function getEmergencyMessage(int $level): string
    {
        if ($level >= 8) {
            return "🚨 Urgence élevée - Consultation immédiate recommandée";
        } elseif ($level >= 5) {
            return "⚠️ Urgence modérée - Consultation prioritaire recommandée";
        } else {
            return "✅ Urgence faible - Consultation normale";
        }
    }

    #[Route('/api/ai/health', name: 'ai_health', methods: ['GET'])]
    public function healthCheck(): JsonResponse
    {
        try {
            $projectDir = $this->parameterBag->get('kernel.project_dir');
            $process = new Process(['python', '--version']);
            $process->setWorkingDirectory($projectDir);
            $process->run();

            if (!$process->isSuccessful()) {
                return new JsonResponse([
                    'status' => 'error',
                    'message' => 'Python not available'
                ], 500);
            }

            $projectDir = $this->parameterBag->get('kernel.project_dir');
            return new JsonResponse([
                'status' => 'healthy',
                'python_version' => trim($process->getOutput()),
                'services' => [
                    'triage_system' => file_exists($projectDir . '/ai_services/triage_system.py'),
                    'prescription_suggester' => file_exists($projectDir . '/ai_services/prescription_suggester.py'),
                    'consultation_summarizer' => file_exists($projectDir . '/ai_services/consultation_summarizer.py')
                ]
            ]);

        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
