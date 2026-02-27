<?php

namespace App\Controller;

use App\Repository\RepasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Enum\TypeMoment;

#[Route('/nutrition/dashboard', priority: 10)]
class NutritionDashboardController extends AbstractController
{
    #[Route('', name: 'app_nutrition_dashboard')]
    public function index(Request $request, RepasRepository $repasRepository, \App\Repository\AlerteRepository $alerteRepository): Response
    {
        /** @var \App\Entity\Utilisateur $user */
        $user = $this->getUser();

        if (!$user) {
            return $this->redirectToRoute('app_login');
        }

        // Get filter (week or month)
        $filter = $request->query->get('filter', 'week'); // default to week

        $startDate = new \DateTime();
        if ($filter === 'month') {
            $startDate->modify('-30 days');
        } else {
            $startDate->modify('-7 days');
        }
        $startDate->setTime(0, 0, 0);

        // Fetch user's meals from the given start date
        // Note: For simplicity, we fetch all from DB and filter in PHP, or use query builder.
        // Assuming we fetch all and filter for now.
        $allRepas = $repasRepository->findByUtilisateur($user);
        
        $filteredRepas = array_filter($allRepas, function($repas) use ($startDate) {
            return $repas->getDateConsommation() >= $startDate;
        });

        // Sort by date ASC
        usort($filteredRepas, function($a, $b) {
            return $a->getDateConsommation() <=> $b->getDateConsommation();
        });

        $chartData = [];
        // We will fetch real alerts instead of manually calculating lateMeals here
        // $lateMeals = [];

        foreach ($filteredRepas as $repas) {
            $timingScore = $this->calculateTimingScore($repas);
            $nutritionScore = $this->calculateNutritionScore($repas);
            $balanceScore = $this->calculateBalanceScore($repas);
            $interactionScore = min(10, $repas->getPointsGagnes() / 10); // Scale down pointsGagnes to out of 10 if necessary, or just use it directly. Assuming 0-10 or 0-100. Let's assume it's roughly 10s. Let's cap at 10.
            if ($interactionScore == 0 && $repas->getPointsGagnes() > 0) {
                // Adjusting scale based on how points are usually awarded. 
                // Let's just use min($repas->getPointsGagnes(), 10) for a 0-10 scale.
                $interactionScore = min($repas->getPointsGagnes(), 10);
            }

            // Global score (average of the 4)
            $globalScore = ($timingScore + $nutritionScore + $balanceScore + $interactionScore) / 4;

            // Check for late meals for the chart (but not for the alerts panel)
            $hour = (int)$repas->getDateConsommation()->format('H');
            $isLate = false;
            if ($repas->getTypeMoment() === TypeMoment::SOIR && $hour >= 21) {
                $isLate = true;
                // $lateMeals[] = $repas;
            }

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
                'isLate' => $isLate,
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

        // Fetch all alerts for the user
        $userAlerts = $alerteRepository->findBy(
            ['utilisateur' => $user],
            ['dateAlerte' => 'DESC']
        );

        return $this->render('nutrition/dashboard.html.twig', [
            'chartData' => $chartData,
            'dailyChartLabels' => $dailyChartLabels,
            'dailyChartData' => $dailyChartData,
            'dailyChartColors' => $dailyChartColors,
            'userAlerts' => $userAlerts,
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
        // Simplistic calc based on calories. Assuming 400-800 is a good range per main meal.
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

        // Ideal macros roughly: 25% pro, 50% glu, 25% lip
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
