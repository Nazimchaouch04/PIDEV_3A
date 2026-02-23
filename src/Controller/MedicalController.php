<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use App\Repository\RendezVousRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ConsultationRepository;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Process\Process;

#[Route('/medical')]
class MedicalController extends AbstractController
{
    private ParameterBagInterface $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    #[Route('/dossier', name: 'app_medical_dossier')]
    public function dossier(
        RendezVousRepository $rdvRepo,
        ConsultationRepository $consultRepo
    ): Response {

        $user = $this->getUser();

        return $this->render('medical/dossier.html.twig', [
            'rdvs' => $rdvRepo->findBy(['patient'=>$user]),
            'consultations' => $consultRepo->createQueryBuilder('c')
        ->join('c.rendezVous','r')
        ->where('r.patient = :patient')
        ->setParameter('patient',$user)
        ->getQuery()
        ->getResult()

        ]);
    }

    // LIST MY RENDEZ-VOUS
    #[Route('', name: 'app_medical')]
    public function index(RendezVousRepository $rendezVousRepository): Response
    {
        $user = $this->getUser();

        $rendezVous = $rendezVousRepository->findBy(
            ['patient' => $user],
            ['dateHeure' => 'DESC']
        );

        return $this->render('medical/index.html.twig', [
            'rendezVous' => $rendezVous,
        ]);
    }

    // CREATE RENDEZ-VOUS
   #[Route('/new', name: 'app_medical_new')]
public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    $rdv = new RendezVous();
    $rdv->setPatient($this->getUser());
    $rdv->setStatut('DEMANDE');

    $form = $this->createForm(RendezVousType::class, $rdv);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

        $rdv->setSpecialiste($form->get('specialiste')->getData());

        $entityManager->persist($rdv);
        $entityManager->flush();

        // Automatically analyze emergency level
        $this->analyzeEmergencyLevel($rdv, $entityManager);

        return $this->redirectToRoute('app_medical');
    }

    return $this->render('medical/new.html.twig', [
        'form' => $form->createView(),
    ]);
}

    // SHOW RENDEZ-VOUS
    #[Route('/{id<\d+>}', name: 'app_medical_show', methods: ['GET'])]
    public function show(RendezVous $rdv): Response
    {
        if ($rdv->getPatient() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        return $this->render('medical/show.html.twig', [
            'rdv' => $rdv,
        ]);
    }

    // MARK AS REALISED
    #[Route('/{id}/realise', name: 'app_medical_realise', methods: ['POST'])]
    public function markAsRealised(RendezVous $rdv, EntityManagerInterface $entityManager): Response
    {
        if ($rdv->getPatient() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $rdv->setStatut('REALISE');
        $entityManager->flush();

        $this->addFlash('success', 'Rendez-vous marqué comme réalisé');

        return $this->redirectToRoute('app_medical');
    }

    // CANCEL RENDEZ-VOUS
    #[Route('/{id}/annule', name: 'app_medical_annule', methods: ['POST'])]
    public function cancel(RendezVous $rdv, EntityManagerInterface $entityManager): Response
    {
        if ($rdv->getPatient() !== $this->getUser()) {
            throw $this->createAccessDeniedException();
        }

        $rdv->setStatut('ANNULE');
        $entityManager->flush();

        $this->addFlash('warning', 'Rendez-vous annulé');

        return $this->redirectToRoute('app_medical');
    }
    #[Route('/{id}/delete', name: 'app_medical_delete', methods: ['POST'])]
public function delete(Request $request, RendezVous $rdv, EntityManagerInterface $entityManager): Response
{
    // security: only owner can delete
    if ($rdv->getPatient() !== $this->getUser()) {
        throw $this->createAccessDeniedException();
    }

    if ($this->isCsrfTokenValid('delete' . $rdv->getId(), $request->request->get('_token'))) {
        $entityManager->remove($rdv);
        $entityManager->flush();
    }

    return $this->redirectToRoute('app_medical');
}
#[Route('/{id}/confirme', name: 'app_medical_confirme', methods: ['POST'])]
public function confirme(RendezVous $rdv, EntityManagerInterface $entityManager): Response
{
    $rdv->setStatut('CONFIRME');
    $entityManager->flush();

    return $this->redirectToRoute('app_medical');
}
#[Route('/{id}/edit', name: 'app_medical_edit')]
public function edit(
    Request $request,
    RendezVous $rdv,
    EntityManagerInterface $entityManager
): Response {
    if ($rdv->getPatient() !== $this->getUser()) {
        throw $this->createAccessDeniedException();
    }

    $form = $this->createForm(RendezVousType::class, $rdv);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        $entityManager->flush();

        return $this->redirectToRoute('app_medical');
    }

    return $this->render('medical/edit.html.twig', [
        'form' => $form->createView(),
        'rdv' => $rdv,
    ]);
}

private function analyzeEmergencyLevel(RendezVous $rendezVous, EntityManagerInterface $em): void
{
    try {
        $projectDir = $this->parameterBag->get('kernel.project_dir');
        $process = new Process(['python', $projectDir . '/ai_services/triage_system.py', 
                               $rendezVous->getMotif(), 'Emergency assessment']);
        $process->setWorkingDirectory($projectDir);
        $process->run();

        if ($process->isSuccessful()) {
            $output = $process->getOutput();
            // Convert to UTF-8 if needed
            if (!mb_check_encoding($output, 'UTF-8')) {
                $output = mb_convert_encoding($output, 'UTF-8', 'UTF-8, ISO-8859-1, Windows-1252');
            }
            
            $result = json_decode($output, true);
            
            if (json_last_error() === JSON_ERROR_NONE && $result) {
                // Calculate emergency level (1-10 scale) based on triage results
                $emergencyLevel = $this->calculateEmergencyLevel($result);
                $rendezVous->setNiveauUrgence($emergencyLevel);
                $em->flush();
            }
        }
    } catch (\Exception $e) {
        // Log error but don't break the rendez-vous creation
        // In production, you might want to log this: error_log($e->getMessage());
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

}