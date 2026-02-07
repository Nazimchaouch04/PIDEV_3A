<?php

namespace App\Controller;

use App\Repository\CertificationRepository;
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
        RendezVousRepository $rendezVousRepository,
        CertificationRepository $certificationRepository // Injection du repo
    ): Response {
        /** @var \App\Entity\Utilisateur $user */
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // --- SÉCURITÉ : VÉRIFICATION DU STATUT DE CERTIFICATION ---
        // On cherche si cet utilisateur a une demande en attente
        $pendingCert = $certificationRepository->findOneBy([
            'utilisateur' => $user,
            'statut' => 'PENDING'
        ]);

        if ($pendingCert) {
            // Option 1 : Afficher une page d'attente (Recommandé)
            return $this->render('certification/waiting.html.twig');

            // Option 2 : Le déconnecter de force (Alternative)
            // $this->addFlash('warning', 'Votre compte est en attente de validation.');
            // return $this->redirectToRoute('app_logout');
        }
        // -----------------------------------------------------------

        // Chargement des données du dashboard (Code existant)
        $todayRepas = $repasRepository->findTodayByUtilisateur($user);
        $weekSeances = $seanceSportRepository->findThisWeekByUtilisateur($user);
        $upcomingRdv = $rendezVousRepository->findUpcomingByUtilisateur($user);

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
            'upcomingRdv' => array_slice($upcomingRdv, 0, 3),
            'totalCaloriesToday' => $totalCaloriesToday,
            'totalMinutesSport' => $totalMinutesSport,
        ]);
    }
}
