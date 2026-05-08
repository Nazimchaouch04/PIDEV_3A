<?php

namespace App\Controller;

use App\Repository\AlerteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/coach')]
// #[IsGranted('ROLE_COACH')] // Removed temporarily if user doesn't have strict roles set up for testing
class CoachAlertsController extends AbstractController
{
    #[Route('/alertes', name: 'app_coach_alertes', methods: ['GET'])]
    public function index(AlerteRepository $alerteRepository): Response
    {
        // Fetch all SMS alerts sent by the system (type EXCITANT_TARDIF)
        // Order them by the most recent first
        $alertes = $alerteRepository->findBy(
            ['type' => 'EXCITANT_TARDIF'],
            ['dateAlerte' => 'DESC']
        );

        return $this->render('coach/alertes_index.html.twig', [
            'alertes' => $alertes,
        ]);
    }
}
