<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\UtilisateurRepository;
use App\Service\MentalKPIService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;

class MentalReportingController extends AbstractController
{
    public function __construct(
        private MentalKPIService $kpiService
    ) {}

    #[Route('/bo/mental/reporting', name: 'app_mental_admin_reporting')]
    public function adminReporting(UtilisateurRepository $userRepository): Response
    {
        if (!$this->isGranted('ROLE_ADMIN') && !$this->isGranted('ROLE_SPECIALISTE')) {
            throw $this->createAccessDeniedException();
        }

        $users = $userRepository->findAll();
        $globalStats = [
            'avg_resilience' => 0,
            'avg_engagement' => 0,
            'count' => count($users)
        ];

        $resilienceSum = 0;
        $engagementSum = 0;
        $usersWithData = [];

        foreach ($users as $user) {
            $resilience = $this->kpiService->calculateResilienceScore($user);
            $engagement = $this->kpiService->getEngagementIndex($user);
            
            $resilienceSum += $resilience;
            $engagementSum += $engagement;

            $usersWithData[] = [
                'user' => $user,
                'resilience' => $resilience,
                'engagement' => $engagement
            ];
        }

        if ($globalStats['count'] > 0) {
            $globalStats['avg_resilience'] = round($resilienceSum / $globalStats['count'], 1);
            $globalStats['avg_engagement'] = round($engagementSum / $globalStats['count'], 1);
        }

        return $this->render('bo/mental/reporting/global.html.twig', [
            'globalStats' => $globalStats,
            'usersData' => $usersWithData
        ]);
    }

    #[Route('/mental/portrait', name: 'app_mental_portrait')]
    public function userPortrait(): Response
    {
        /** @var Utilisateur $user */
        $user = $this->getUser();
        
        $resilience = $this->kpiService->calculateResilienceScore($user);
        $engagement = $this->kpiService->getEngagementIndex($user);
        $correlations = $this->kpiService->getNutritionAgilityCorrelation($user);

        return $this->render('mental/reporting/portrait.html.twig', [
            'resilience' => $resilience,
            'engagement' => $engagement,
            'correlations' => $correlations
        ]);
    }

    #[Route('/mental/portrait/export', name: 'app_mental_portrait_export')]
    public function exportPdf(): Response
    {
        /** @var Utilisateur $user */
        $user = $this->getUser();
        
        $resilience = $this->kpiService->calculateResilienceScore($user);
        $engagement = $this->kpiService->getEngagementIndex($user);
        
        $html = $this->renderView('mental/reporting/pdf_report.html.twig', [
            'user' => $user,
            'resilience' => $resilience,
            'engagement' => $engagement,
            'date' => new \DateTime()
        ]);

        $options = new Options();
        $options->set('defaultFont', 'Arial');
        
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        return new Response(
            $dompdf->output(),
            200,
            [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="BioSync_Mental_Report.pdf"'
            ]
        );
    }
}
