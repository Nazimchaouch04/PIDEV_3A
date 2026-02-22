<?php

namespace App\Controller;

use App\Entity\Aliment;
use App\Form\AlimentSimpleType;
use App\Repository\AlimentRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Service\RepasService;
use App\Service\GeminiService;

#[Route('/aliment')]
final class AlimentController extends AbstractController
{
    #[Route(name: 'app_aliment_index', methods: ['GET'])]
    public function index(AlimentRepository $alimentRepository): Response
    {
        return $this->render('aliment/index.html.twig', [
            'aliments' => $alimentRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_aliment_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, RepasService $repasService): Response
    {
        $aliment = new Aliment();
        
        // Vérifier si on vient d'une page repas (via referer)
        $referer = $request->headers->get('referer');
        $repasId = null;
        
        // Essayer de récupérer l'ID du repas depuis le referer
        if ($referer && preg_match('/\/repas\/(\d+)/', $referer, $matches)) {
            $repasId = $matches[1];
            $repas = $entityManager->getRepository('App\Entity\Repas')->find($repasId);
            if ($repas) {
                $aliment->setRepas($repas);
            }
        }
        
        // Alternative: vérifier si on a un paramètre repas_id dans la requête
        if (!$repasId && $request->query->get('repas_id')) {
            $repasId = $request->query->get('repas_id');
            $repas = $entityManager->getRepository('App\Entity\Repas')->find($repasId);
            if ($repas) {
                $aliment->setRepas($repas);
            }
        }
        
        $form = $this->createForm(AlimentSimpleType::class, $aliment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($aliment);
            
            // Mettre à jour les points du repas selon son moment
            $repas = $aliment->getRepas();
            if ($repas) {
                // D'abord ajouter l'aliment à la base
                $entityManager->flush();
                
                // Puis recalculer les points avec les nouvelles données
                $repasService->mettreAJourPoints($repas);
                $entityManager->persist($repas);
                $entityManager->flush();
            } else {
                $entityManager->flush();
            }
            
            // Rediriger vers la page repas si on vient de là
            if ($repasId) {
                return $this->redirectToRoute('app_repas_show', ['id' => $repasId]);
            }
            
            return $this->redirectToRoute('app_aliment_index');
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Le formulaire contient des erreurs. Vérifiez les champs requis et les valeurs.');
        }

        return $this->render('aliment/new.html.twig', [
            'aliment' => $aliment,
            'form' => $form->createView(),
            'repasId' => $repasId, // Ajouter le repasId au template
            'repasService' => $repasService, // Ajouter le service RepasService
        ]);
    }

    #[Route('/{id}/show', name: 'app_aliment_show', methods: ['GET'])]
    public function show(?Aliment $aliment): Response
    {
        if (!$aliment) {
            throw $this->createNotFoundException('Aliment not found');
        }
        return $this->render('aliment/show.html.twig', [
            'aliment' => $aliment,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_aliment_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ?Aliment $aliment, EntityManagerInterface $entityManager): Response
    {
        if (!$aliment) {
            throw $this->createNotFoundException('Aliment not found');
        }
        $form = $this->createForm(AlimentSimpleType::class, $aliment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            
            // Rediriger vers la page repas si l'aliment est associé à un repas
            if ($aliment->getRepas()) {
                return $this->redirectToRoute('app_repas_show', ['id' => $aliment->getRepas()->getId()]);
            }
            
            return $this->redirectToRoute('app_aliment_index', [], Response::HTTP_SEE_OTHER);
        }

        if ($form->isSubmitted() && !$form->isValid()) {
            $this->addFlash('error', 'Le formulaire contient des erreurs. Vérifiez les champs requis et les valeurs.');
        }

        return $this->render('aliment/edit.html.twig', [
            'aliment' => $aliment,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/chatbot', name: 'app_aliment_chatbot', methods: ['POST'])]
    public function chatbot(Request $request, GeminiService $geminiService): JsonResponse
    {
        $query = $request->request->get('query');
        
        error_log('=== CHATBOT REQUEST ===');
        error_log('Chatbot query received: ' . $query);
        error_log('Request method: ' . $request->getMethod());
        error_log('Request URI: ' . $request->getUri());
        
        if (!$query) {
            error_log('ERROR: Query is required');
            return new JsonResponse(['error' => 'Query is required'], 400);
        }

        try {
            error_log('Calling GeminiService...');
            $nutritionData = $geminiService->getNutritionalInfo($query);
            
            error_log('Nutrition data received: ' . print_r($nutritionData, true));
            
            if ($nutritionData) {
                error_log('SUCCESS: Returning nutrition data');
                return new JsonResponse($nutritionData);
            } else {
                error_log('WARNING: No nutrition data, returning defaults');
                return new JsonResponse([
                    'calories' => 50,
                    'proteines' => 1.0,
                    'glucides' => 10.0,
                    'lipides' => 0.5
                ]);
            }
        } catch (\Exception $e) {
            error_log('Chatbot Error: ' . $e->getMessage());
            error_log('Error Trace: ' . $e->getTraceAsString());
            return new JsonResponse([
                'calories' => 50,
                'proteines' => 1.0,
                'glucides' => 10.0,
                'lipides' => 0.5
            ]);
        }
    }

    #[Route('/{id}', name: 'app_aliment_delete', methods: ['POST'])]
    public function delete(Request $request, ?Aliment $aliment, EntityManagerInterface $entityManager): Response
    {
        if (!$aliment) {
            throw $this->createNotFoundException('Aliment not found');
        }
        
        // Récupérer le repas avant la suppression pour la redirection
        $repas = $aliment->getRepas();
        
        if ($this->isCsrfTokenValid('delete'.$aliment->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($aliment);
            $entityManager->flush();
            
            // Gérer la redirection
            $redirectTo = $request->query->get('redirect_to');
            $repasId = $request->query->get('repas_id');
            
            if ($redirectTo === 'admin_meal_foods' && ($repasId || $repas)) {
                $redirectRepasId = $repasId ?: $repas->getId();
                return $this->redirectToRoute('admin_meal_foods', ['id' => $redirectRepasId], Response::HTTP_SEE_OTHER);
            }
            
            // Rediriger vers la page repas si l'aliment est associé à un repas
            if ($repas) {
                return $this->redirectToRoute('app_repas_show', ['id' => $repas->getId()]);
            }
        }

        return $this->redirectToRoute('app_aliment_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/pdf', name: 'app_aliment_pdf', methods: ['GET'])]
    public function exportPdf(AlimentRepository $alimentRepository): Response
    {
        // Configure Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);
        
        // Get all aliments
        $aliments = $alimentRepository->findAll();
        
        // Generate HTML
        $html = $this->renderView('aliment/pdf.html.twig', [
            'aliments' => $aliments,
            'date' => new \DateTime()
        ]);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Generate filename
        $filename = 'aliments_' . date('Y-m-d_H-i-s') . '.pdf';
        
        // Download the PDF
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]);
    }
}