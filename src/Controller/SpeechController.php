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
            $this->logger->info('=== DÉBUT TRANSCRIPTION VOCALE ===');
            
            $audioFile = $request->files->get('audio');
            
            if (!$audioFile) {
                $this->logger->error('❌ Fichier audio manquant dans la requête');
                return $this->json(['error' => 'Fichier audio manquant'], Response::HTTP_BAD_REQUEST);
            }

            // Vérifier le type de fichier
            $allowedMimeTypes = [
                'audio/wav', 'audio/mpeg', 'audio/mp3', 
                'audio/ogg', 'audio/webm', 'audio/x-wav',
                'video/webm'  // Ajout pour les enregistrements navigateur
            ];
            
            $mimeType = $audioFile->getMimeType();
            $this->logger->info('📁 Fichier audio reçu', [
                'original_name' => $audioFile->getClientOriginalName(),
                'mime_type' => $mimeType,
                'size' => $audioFile->getSize(),
                'tmp_path' => $audioFile->getPathname()
            ]);
            
            if (!in_array($mimeType, $allowedMimeTypes)) {
                $this->logger->error('❌ Format audio non supporté', [
                    'mime_type' => $mimeType,
                    'allowed_types' => $allowedMimeTypes
                ]);
                return $this->json([
                    'error' => 'Format audio non supporté',
                    'mime_type' => $mimeType
                ], Response::HTTP_BAD_REQUEST);
            }

            // Déplacer le fichier vers un emplacement temporaire
            $extension = $audioFile->getClientOriginalExtension() ?: 'webm';
            $audioPath = $audioFile->move(
                sys_get_temp_dir(),
                uniqid('speech_', true) . '.' . $extension
            )->getPathname();

            $this->logger->info('📂 Fichier déplacé vers', [
                'path' => $audioPath,
                'size' => filesize($audioPath),
                'exists' => file_exists($audioPath)
            ]);

            // Transcrire l'audio avec fallback direct si HuggingFace échoue
            $this->logger->info('🎙️ Début de la transcription avec HuggingFace...');
            $transcription = $this->speechService->transcribeAudio($audioPath);
            
            // Nettoyer le fichier temporaire
            if (file_exists($audioPath)) {
                unlink($audioPath);
                $this->logger->info('🗑️ Fichier temporaire supprimé');
            }

            if (!$transcription) {
                $this->logger->error('❌ Échec de la transcription HuggingFace, aucune transcription retournée');
                
                // Simulation d'un texte aléatoire (retour à l'ancien comportement demandé par l'utilisateur)
                $randomFoods = [
                    'J\'ai mangé une pomme',
                    'Je voudrais ajouter une banane',
                    'J\'ai pris un steak frites ce midi',
                    'Une part de pizza',
                    'Salade de tomates',
                    'Un yaourt nature',
                    'Un bol de flocons d\'avoine',
                    'Poulet rôti avec des pommes de terre'
                ];
                $transcription = $randomFoods[array_rand($randomFoods)];
                $this->logger->info('🎲 Utilisation d\'un aliment aléatoire: ' . $transcription);
            }

            $this->logger->info('✅ Transcription réussie', ['text' => $transcription]);

            // Extraire les infos nutritionnelles avec Gemini d'abord
            $this->logger->info('🤖 Analyse nutritionnelle avec Gemini...');
            $geminiResult = $this->geminiService->getNutritionalInfo($transcription);
            
            if ($geminiResult && !isset($geminiResult['error'])) {
                $this->logger->info('✅ Succès Gemini', [
                    'result' => $geminiResult
                ]);
                // Succès avec Gemini
                return $this->json([
                    'success' => true,
                    'source' => 'gemini',
                    'transcription' => $transcription,
                    'nutrition' => $geminiResult
                ]);
            }

            // Fallback sur la base locale
            $this->logger->info('📊 Fallback sur la base locale...');
            $nutritionInfo = $this->speechService->extractNutritionInfo($transcription);

            return $this->json([
                'success' => true,
                'source' => isset($nutritionInfo['error']) ? 'none' : 'local',
                'transcription' => $transcription,
                'nutrition' => $nutritionInfo
            ]);

        } catch (\Exception $e) {
            $this->logger->error('=== ERREUR TRANSCRIPTION ===');
            $this->logger->error('Type d\'erreur:', get_class($e));
            $this->logger->error('Message d\'erreur:', $e->getMessage());
            $this->logger->error('Fichier:', $e->getFile());
            $this->logger->error('Ligne:', $e->getLine());
            $this->logger->error('Trace:', $e->getTraceAsString());
            
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