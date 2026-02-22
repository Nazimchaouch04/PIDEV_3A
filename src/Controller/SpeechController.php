<?php

namespace App\Controller;

use App\Service\HuggingFaceSpeechService;
use App\Service\GeminiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Psr\Log\LoggerInterface;

#[Route('/api/speech', name: 'api_speech_')]
class SpeechController extends AbstractController
{
    private HuggingFaceSpeechService $speechService;
    private GeminiService $geminiService;
    private LoggerInterface $logger;

    public function __construct(
        HuggingFaceSpeechService $speechService,
        GeminiService $geminiService,
        LoggerInterface $logger
    ) {
        $this->speechService = $speechService;
        $this->geminiService = $geminiService;
        $this->logger = $logger;
    }

    #[Route('/transcribe', name: 'transcribe', methods: ['POST'])]
    public function transcribe(Request $request): JsonResponse
    {
        try {
            $audioFile = $request->files->get('audio');
            
            if (!$audioFile) {
                return $this->json(['error' => 'Fichier audio manquant'], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier le type de fichier
            $allowedMimeTypes = [
                'audio/wav', 'audio/mpeg', 'audio/mp3', 
                'audio/ogg', 'audio/webm', 'audio/x-wav'
            ];
            
            if (!in_array($audioFile->getMimeType(), $allowedMimeTypes)) {
                return $this->json([
                    'error' => 'Format audio non supporté',
                    'mime_type' => $audioFile->getMimeType()
                ], Response::HTTP_BAD_REQUEST);
            }

            // Déplacer le fichier vers un emplacement temporaire
            $extension = $audioFile->getClientOriginalExtension() ?: 'webm';
            $audioPath = $audioFile->move(
                sys_get_temp_dir(),
                uniqid('speech_', true) . '.' . $extension
            )->getPathname();

            $this->logger->info('Fichier audio reçu', [
                'path' => $audioPath,
                'size' => filesize($audioPath),
                'mime' => $audioFile->getMimeType()
            ]);

            // Transcrire l'audio
            $transcription = $this->speechService->transcribeAudio($audioPath);
            
            // Nettoyer le fichier temporaire
            if (file_exists($audioPath)) {
                unlink($audioPath);
            }

            if (!$transcription) {
                return $this->json([
                    'error' => 'Échec de la transcription',
                    'details' => 'Impossible de transcrire l\'audio'
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            // Extraire les infos nutritionnelles avec Gemini d'abord
            $geminiResult = $this->geminiService->getNutritionalInfo($transcription);
            
            if ($geminiResult && !isset($geminiResult['error'])) {
                // Succès avec Gemini
                return $this->json([
                    'success' => true,
                    'source' => 'gemini',
                    'transcription' => $transcription,
                    'nutrition' => $geminiResult
                ]);
            }

            // Fallback sur la base locale
            $nutritionInfo = $this->speechService->extractNutritionInfo($transcription);

            return $this->json([
                'success' => true,
                'source' => isset($nutritionInfo['error']) ? 'none' : 'local',
                'transcription' => $transcription,
                'nutrition' => $nutritionInfo
            ]);

        } catch (\Exception $e) {
            $this->logger->error('Erreur API speech: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString()
            ]);
            
            return $this->json([
                'error' => 'Erreur lors du traitement',
                'message' => $e->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    #[Route('/test', name: 'test', methods: ['GET'])]
    public function test(): JsonResponse
    {
        return $this->json([
            'message' => 'API vocale opérationnelle',
            'symfony_version' => \Symfony\Component\HttpKernel\Kernel::VERSION,
            'endpoints' => [
                'transcribe' => '/api/speech/transcribe (POST avec fichier audio)'
            ]
        ]);
    }
}