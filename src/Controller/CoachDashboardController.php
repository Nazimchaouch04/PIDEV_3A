<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\AlerteRepository;
use App\Repository\RepasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Enum\TypeMoment;

#[Route('/coach')]
class CoachDashboardController extends AbstractController
{
    #[Route('/patient/{id}/dashboard', name: 'app_coach_patient_dashboard')]
    public function index(Utilisateur $patient, Request $request, RepasRepository $repasRepository, AlerteRepository $alerteRepository): Response
    {
        // Require coach role (uncomment if using roles properly)
        // $this->denyAccessUnlessGranted('ROLE_COACH');

        // Get filter (week or month)
        $filter = $request->query->get('filter', 'week');

        $startDate = new \DateTime();
        if ($filter === 'month') {
            $startDate->modify('-30 days');
        } else {
            $startDate->modify('-7 days');
        }
        $startDate->setTime(0, 0, 0);

        // Fetch patient's meals from the given start date
        $allRepas = $repasRepository->findByUtilisateur($patient);
        
        $filteredRepas = array_filter($allRepas, function($repas) use ($startDate) {
            return $repas->getDateConsommation() >= $startDate;
        });

        // Sort by date ASC
        usort($filteredRepas, function($a, $b) {
            return $a->getDateConsommation() <=> $b->getDateConsommation();
        });

        $chartData = [];

        foreach ($filteredRepas as $repas) {
            $timingScore = $this->calculateTimingScore($repas);
            $nutritionScore = $this->calculateNutritionScore($repas);
            $balanceScore = $this->calculateBalanceScore($repas);
            $interactionScore = min(10, $repas->getPointsGagnes() / 10);
            if ($interactionScore == 0 && $repas->getPointsGagnes() > 0) {
                $interactionScore = min($repas->getPointsGagnes(), 10);
            }

            $globalScore = ($timingScore + $nutritionScore + $balanceScore + $interactionScore) / 4;

            $dateStr = $repas->getDateConsommation()->format('d/m/Y');
            
            $chartData[] = [
                'id' => $repas->getId(),
                'titre' => $repas->getTitreRepas(),
                'type' => $repas->getTypeMoment()->label(),
                'date' => $dateStr,
                'heure' => $repas->getDateConsommation()->format('H:i'),
                'globalScore' => round($globalScore, 1),
                'timingScore' => round($timingScore, 1),
                'nutritionScore' => round($nutritionScore, 1),
                'balanceScore' => round($balanceScore, 1),
                'interactionScore' => round($interactionScore, 1),
                'color' => $this->getScoreColor($globalScore)
            ];
        }

        // Aggregate by day for daily average chart
        $dailyAverages = [];
        foreach ($chartData as $data) {
            $date = $data['date'];
            if (!isset($dailyAverages[$date])) {
                $dailyAverages[$date] = [
                    'count' => 0,
                    'totalScore' => 0,
                    'scores' => []
                ];
            }
            $dailyAverages[$date]['count']++;
            $dailyAverages[$date]['totalScore'] += $data['globalScore'];
            $dailyAverages[$date]['scores'][] = $data['globalScore'];
        }

        $dailyChartLabels = [];
        $dailyChartData = [];
        $dailyChartColors = [];

        foreach ($dailyAverages as $date => $dayData) {
            $dailyChartLabels[] = $date;
            $avg = $dayData['totalScore'] / $dayData['count'];
            $dailyChartData[] = round($avg, 1);
            $dailyChartColors[] = $this->getScoreColor($avg, true);
        }

        // Fetch coach (SMS) alerts for this patient
        $coachAlerts = $alerteRepository->findBy(
            [
                'utilisateur' => $patient,
                'type' => 'EXCITANT_TARDIF'
            ],
            ['dateAlerte' => 'DESC']
        );

        return $this->render('coach/user_dashboard.html.twig', [
            'patient' => $patient,
            'chartData' => $chartData,
            'dailyChartLabels' => $dailyChartLabels,
            'dailyChartData' => $dailyChartData,
            'dailyChartColors' => $dailyChartColors,
            'coachAlerts' => $coachAlerts,
            'filter' => $filter,
            'startDate' => $startDate
        ]);
    }

    private function calculateTimingScore($repas): float
    {
        $hour = (float)$repas->getDateConsommation()->format('H') + ((float)$repas->getDateConsommation()->format('i') / 60);
        $score = 10;

        switch ($repas->getTypeMoment()) {
            case TypeMoment::MATIN:
                if ($hour < 6 || $hour > 10) $score -= abs($hour - 8);
                break;
            case TypeMoment::MIDI:
                if ($hour < 12 || $hour > 14) $score -= abs($hour - 13);
                break;
            case TypeMoment::COLLATION:
                if ($hour < 15 || $hour > 17) $score -= abs($hour - 16);
                break;
            case TypeMoment::SOIR:
                if ($hour < 19 || $hour > 21) $score -= abs($hour - 20);
                if ($hour >= 21) $score -= 2; // Extra penalty for late dinners
                break;
        }

        return max(0, min(10, $score));
    }

    private function calculateNutritionScore($repas): float
    {
        $cals = $repas->getTotalCalories();
        if ($cals == 0) return 0;

        $score = 10;
        if ($repas->getTypeMoment() === TypeMoment::COLLATION) {
            if ($cals > 300) $score -= ($cals - 300) / 50;
        } else {
            if ($cals < 300) $score -= (300 - $cals) / 50;
            if ($cals > 1000) $score -= ($cals - 1000) / 100;
        }

        return max(0, min(10, $score));
    }

    private function calculateBalanceScore($repas): float
    {
        $cals = $repas->getTotalCalories();
        if ($cals == 0) return 0;

        $pro = $repas->getTotalProteines() * 4; // 4 cals per gram
        $glu = $repas->getTotalGlucides() * 4;
        $lip = $repas->getTotalLipides() * 9;

        $proPct = $pro / $cals;
        $gluPct = $glu / $cals;
        $lipPct = $lip / $cals;

        $score = 10;
        $score -= abs(0.25 - $proPct) * 10;
        $score -= abs(0.50 - $gluPct) * 10;
        $score -= abs(0.25 - $lipPct) * 10;

        return max(0, min(10, $score));
    }

    private function getScoreColor(float $score, bool $hex = false): string
    {
        if ($score >= 7) {
            return $hex ? '#10b981' : 'success'; // Green
        } elseif ($score >= 4) {
            return $hex ? '#f59e0b' : 'warning'; // Yellow
        } else {
            return $hex ? '#ef4444' : 'danger'; // Red
        }
    }
}
