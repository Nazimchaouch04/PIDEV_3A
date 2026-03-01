<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\RepasRepository;
use App\Repository\RendezVousRepository;
use App\Repository\SeanceSportRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(
        RepasRepository       $repasRepository,
        SeanceSportRepository $seanceSportRepository,
        RendezVousRepository  $rendezVousRepository
    ): Response {
        $user = $this->getUser();

        if (!$user instanceof Utilisateur) {
            return $this->redirectToRoute('app_login');
        }

        if ($this->isGranted('ROLE_ADMIN')) {
            return $this->redirectToRoute('app_sports');
        }

        if ($this->isGranted('ROLE_COACH')) {
            return $this->redirectToRoute('app_seance_sport_index');
        }

        if ($this->isGranted('ROLE_USER')) {
            return $this->redirectToRoute('app_exercice_index');
        }

        $todayRepas  = $repasRepository->findTodayByUtilisateur($user);
        $weekSeances = $seanceSportRepository->findThisWeekByUtilisateur($user);
        $upcomingRdv = $rendezVousRepository->findBy(
            ['patient'   => $user],
            ['dateHeure' => 'ASC'],
            5
        );

        $totalCaloriesToday = 0;
        foreach ($todayRepas as $repas) {
            $totalCaloriesToday += $repas->getTotalCalories();
        }

        $totalMinutesSport = 0;
        foreach ($weekSeances as $seance) {
            $totalMinutesSport += $seance->getDureeMinutes();
        }

        return $this->render('dashboard/index.html.twig', [
            'user'               => $user,
            'todayRepas'         => $todayRepas,
            'weekSeances'        => $weekSeances,
            'upcomingRdv'        => array_slice($upcomingRdv, 0, 3),
            'totalCaloriesToday' => $totalCaloriesToday,
            'totalMinutesSport'  => $totalMinutesSport,
        ]);
    }
}