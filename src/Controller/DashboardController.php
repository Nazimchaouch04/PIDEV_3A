<?php

namespace App\Controller;

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
        RepasRepository $repasRepository,
        SeanceSportRepository $seanceSportRepository,
        RendezVousRepository $rendezVousRepository
    ): Response {
        $user = $this->getUser();

        $todayRepas = $repasRepository->findTodayByUtilisateur($user);
        $weekSeances = $seanceSportRepository->findThisWeekByUtilisateur($user);

        $totalCaloriesToday = 0;
        foreach ($todayRepas as $repas) {
            $totalCaloriesToday += $repas->getTotalCalories();
        }

        $totalMinutesSport = 0;
        foreach ($weekSeances as $seance) {
            $totalMinutesSport += $seance->getDureeMinutes();
        }

        return $this->render('dashboard/index.html.twig', [
            'user' => $user,
            'todayRepas' => $todayRepas,
            'weekSeances' => $weekSeances,
            'totalCaloriesToday' => $totalCaloriesToday,
            'totalMinutesSport' => $totalMinutesSport,
        ]);
    }
}
