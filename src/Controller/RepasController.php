<?php

namespace App\Controller;

use App\Entity\Repas;
use App\Form\Repas1Type;
use App\Repository\RepasRepository;
use App\Service\ChronoScoreService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

#[Route('/repas')]
final class RepasController extends AbstractController
{
    #[Route(name: 'app_repas_index', methods: ['GET'])]
    public function index(RepasRepository $repasRepository): Response
    {
        return $this->render('repas/index.html.twig', [
            'repas' => $repasRepository->findAll(),
        ]);
    }

    #[Route('/nutrition', name: 'app_nutrition_redirect')]
    public function nutritionRedirect(): Response
    {
        return $this->redirectToRoute('app_repas_index');
    }

    #[Route('/nutrition/new', name: 'app_nutrition_new_redirect')]
    public function nutritionNewRedirect(): Response
    {
        return $this->redirectToRoute('app_repas_new');
    }

    #[Route('/new', name: 'app_repas_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, \App\Service\AlertService $alertService): Response
    {
        $repa = new Repas();
        $user = $this->getUser();
        if ($user) {
            $repa->setUtilisateur($user);
        }
        
        $form = $this->createForm(Repas1Type::class, $repa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($repa);
            $entityManager->flush();

            // Notify Coach if necessary
            $alertService->checkRepasAlerts($repa);

            return $this->redirectToRoute('app_repas_show', ['id' => $repa->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('repas/new.html.twig', [
            'repa' => $repa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}/show', name: 'app_repas_show', methods: ['GET'])]
    public function show(
        ?Repas $repa,
        ChronoScoreService $chronoScoreService,
        RepasRepository $repasRepository
    ): Response
    {
        if (!$repa) {
            throw $this->createNotFoundException('Repas not found');
        }

        $chronoScore = $chronoScoreService->evaluateRepas($repa);

        $weeklyTrend = null;
        $user = $repa->getUtilisateur();
        if ($user) {
            $repasSemaine = $repasRepository->findByUtilisateurAndWeek($user, $repa->getDateConsommation());
            $weeklyTrend = $chronoScoreService->analyzeWeeklyTrend($repasSemaine, $repa);
        }

        return $this->render('repas/show.html.twig', [
            'repa' => $repa,
            'chronoScore' => $chronoScore,
            'weeklyTrend' => $weeklyTrend,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_repas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ?Repas $repa, EntityManagerInterface $entityManager): Response
    {
        if (!$repa) {
            throw $this->createNotFoundException('Repas not found');
        }
        $form = $this->createForm(Repas1Type::class, $repa);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            // Gérer la redirection
            $redirectTo = $request->query->get('redirect_to');
            $userId = $request->query->get('user_id');
            
            if ($redirectTo === 'admin_user_meals' && $userId) {
                return $this->redirectToRoute('admin_user_meals', ['id' => $userId], Response::HTTP_SEE_OTHER);
            }

            return $this->redirectToRoute('app_repas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('repas/edit.html.twig', [
            'repa' => $repa,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_repas_delete', methods: ['POST'])]
    public function delete(Request $request, ?Repas $repa, EntityManagerInterface $entityManager): Response
    {
        if (!$repa) {
            throw $this->createNotFoundException('Repas not found');
        }
        
        // Récupérer l'utilisateur avant la suppression pour la redirection
        $user = $repa->getUtilisateur();
        
        if ($this->isCsrfTokenValid('delete'.$repa->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($repa);
            $entityManager->flush();
        }

        // Gérer la redirection
        $redirectTo = $request->query->get('redirect_to');
        $userId = $request->query->get('user_id');
        
        if ($redirectTo === 'admin_user_meals' && ($userId || $user)) {
            $redirectUserId = $userId ?: $user->getId();
            return $this->redirectToRoute('admin_user_meals', ['id' => $redirectUserId], Response::HTTP_SEE_OTHER);
        }

        return $this->redirectToRoute('app_repas_index', [], Response::HTTP_SEE_OTHER);
    }

    #[Route('/pdf', name: 'app_repas_pdf', methods: ['GET'])]
    public function exportPdf(RepasRepository $repasRepository): Response
    {
        // Configure Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Arial');
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        
        $dompdf = new Dompdf($options);
        
        // Get all repas
        $repas = $repasRepository->findAll();
        
        // Generate HTML
        $html = $this->renderView('repas/pdf.html.twig', [
            'repas' => $repas,
            'date' => new \DateTime()
        ]);
        
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Generate filename
        $filename = 'repas_' . date('Y-m-d_H-i-s') . '.pdf';
        
        // Download the PDF
        return new Response($dompdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]);
    }
}