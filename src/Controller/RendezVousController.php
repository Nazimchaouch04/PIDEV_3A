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
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Process\Process;

#[Route('/rendez/vous')]
final class RendezVousController extends AbstractController
{
    private ParameterBagInterface $parameterBag;

    public function __construct(ParameterBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    #[Route(name: 'app_rendez_vous_index', methods: ['GET'])]
    public function index(RendezVousRepository $rendezVousRepository): Response
    {
        return $this->render('rendez_vous/index.html.twig', [
            'rendez_vouses' => $rendezVousRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_rendez_vous_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rendezVous = new RendezVous();
        $form = $this->createForm(RendezVousType::class, $rendezVous);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Set the patient to current user
            $rendezVous->setPatient($this->getUser());
            
            $entityManager->persist($rendezVous);
            $entityManager->flush();

            // Automatically analyze emergency level
            $this->analyzeEmergencyLevel($rendezVous, $entityManager);

            return $this->redirectToRoute('app_rendez_vous_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('rendez_vous/new.html.twig', [
            'rendez_vous' => $rendezVous,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rendez_vous_show', methods: ['GET'])]
    public function show(RendezVous $rendezVous): Response
    {
        return $this->render('rendez_vous/show.html.twig', [
            'rendez_vous' => $rendezVous,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_rendez_vous_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, RendezVous $rendezVous, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RendezVousType::class, $rendezVous);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_rendez_vous_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('rendez_vous/edit.html.twig', [
            'rendez_vous' => $rendezVous,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_rendez_vous_delete', methods: ['POST'])]
    public function delete(Request $request, RendezVous $rendezVous, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rendezVous->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($rendezVous);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_rendez_vous_index', [], Response::HTTP_SEE_OTHER);
    }
  #[Route('/{id}/confirmer', name: 'app_rendezvous_confirmer')]
public function confirmer(RendezVous $rendezVous, EntityManagerInterface $em): Response
{
    $rendezVous->setStatut('CONFIRME');
    $em->flush();

    return $this->redirectToRoute('app_specialiste');
}

#[Route('/{id}/annuler', name: 'app_rendezvous_annuler')]
public function annuler(RendezVous $rendezVous, EntityManagerInterface $em): Response
{
    $rendezVous->setStatut('ANNULE');
    $em->flush();

    return $this->redirectToRoute('app_specialiste');
}

#[Route('/{id}/reschedule', name: 'app_rendezvous_reschedule')]
public function reschedule(RendezVous $rendezVous, EntityManagerInterface $em): Response
{
    // Move the appointment to tomorrow (or next available slot)
    $newDate = new \DateTime('tomorrow');
    $newDate->setTime(9, 0, 0); // Set to 9:00 AM
    
    // If tomorrow is weekend, move to Monday
    if (in_array($newDate->format('N'), ['6', '7'])) { // 6=Saturday, 7=Sunday
        $newDate->modify('next monday');
    }
    
    $rendezVous->setDateHeure($newDate);
    $em->flush();

    return $this->redirectToRoute('app_specialiste');
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