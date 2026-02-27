<?php

namespace App\Service;

use App\Entity\Repas;
use App\Enum\TypeMoment;

class RepasService
{
    public function __construct(
        private readonly ChronoScoreService $chronoScoreService,
    ) {
    }

    /**
     * Calcule le score intelligent combinant timing et nutrition
     */
    public function calculerScoreIntelligent(Repas $repas): int
    {
        $result = $this->chronoScoreService->evaluateRepas($repas);
        return $result['totalScore'] ?? 0;
    }

    /**
     * Calcule le score selon la cohérence horaire
     */
    private function calculerScoreTiming(Repas $repas): int
    {
        $heure = (int) $repas->getDateConsommation()->format('H');
        $typeMoment = $repas->getTypeMoment();

        return match($typeMoment) {
            TypeMoment::MATIN => ($heure >= 6 && $heure <= 10) ? 1 : 0,
            TypeMoment::MIDI => ($heure >= 11 && $heure <= 14) ? 1 : 0,
            TypeMoment::COLLATION => ($heure >= 9 && $heure <= 11 || $heure >= 15 && $heure <= 17) ? 1 : 0,
            TypeMoment::SOIR => ($heure >= 18 && $heure <= 21) ? 1 : 0,
        };
    }

    /**
     * Calcule le score selon la qualité nutritionnelle
     */
    private function calculerScoreNutrition(Repas $repas): int
    {
        $score = 0;
        $totalCalories = $repas->getTotalCalories();
        $totalProteines = $repas->getTotalProteines();
        $totalGlucides = $repas->getTotalGlucides();
        $totalLipides = $repas->getTotalLipides();

        // Vérification de cohérence nutritionnelle (plus intelligente)
        $score += $this->verifierCoherenceNutritionnelle($totalCalories, $totalProteines, $totalGlucides, $totalLipides);

        // Bonus pour calories raisonnables selon le moment
        $score += $this->calculerScoreCalories($totalCalories, $repas->getTypeMoment());
        
        // Bonus pour calories appropriées (300-1200)
        if ($totalCalories >= 300 && $totalCalories <= 1200) {
            $score += 1; // Calories appropriées
        }
        
        // Bonus pour protéines (plus généreux)
        if ($totalProteines >= 30) {
            $score += 3; // Excellent
        } elseif ($totalProteines >= 15) {
            $score += 2; // Très bien
        } elseif ($totalProteines >= 8) {
            $score += 1; // Bien
        }

        // Bonus pour glucides (nouveau)
        if ($totalGlucides >= 40 && $totalGlucides <= 70) {
            $score += 1; // Glucides modérés et équilibrés
        }
        
        // Bonus pour lipides (nouveau)
        if ($totalLipides >= 10 && $totalLipides <= 25) {
            $score += 1; // Lipides modérés et équilibrés
        }

        // Pénalités pour excès (plus nuancées)
        if ($totalGlucides > 100) {
            $score -= 2; // Trop de sucres
        }
        
        if ($totalLipides > 40) {
            $score -= 2; // Trop de lipides
        }

        // Bonus pour équilibre général
        $score += $this->calculerScoreEquilibre($totalCalories, $totalProteines, $totalGlucides, $totalLipides);
        
        // Bonus pour répartition idéale (50% glucides, 20% protéines, 30% lipides)
        if ($totalCalories > 0) {
            $pourcentageGlucides = ($totalGlucides * 4 / $totalCalories) * 100;
            $pourcentageProteines = ($totalProteines * 4 / $totalCalories) * 100;
            $pourcentageLipides = ($totalLipides * 9 / $totalCalories) * 100;
            
            if (abs($pourcentageGlucides - 50) <= 10 && 
                abs($pourcentageProteines - 20) <= 5 && 
                abs($pourcentageLipides - 30) <= 10) {
                $score += 1; // Répartition idéale
            }
        }

        return $score;
    }

    /**
     * Calcule le score d'équilibre nutritionnel
     */
    private function calculerScoreEquilibre(int $calories, int $proteines, int $glucides, int $lipides): int
    {
        $score = 0;
        
        // Ratio protéines/calories
        if ($calories > 0) {
            $ratioProteines = ($proteines * 4 / $calories) * 100;
            if ($ratioProteines >= 20 && $ratioProteines <= 35) {
                $score += 1; // Bon ratio protéines
            }
            
            // Ratio glucides/calories  
            $ratioGlucides = ($glucides * 4 / $calories) * 100;
            if ($ratioGlucides >= 40 && $ratioGlucides <= 60) {
                $score += 1; // Bon ratio glucides
            }
            
            // Ratio lipides/calories
            $ratioLipides = ($lipides * 9 / $calories) * 100;
            if ($ratioLipides >= 20 && $ratioLipides <= 35) {
                $score += 1; // Bon ratio lipides
            }
        }
        
        return $score;
    }

    /**
     * Vérifie la cohérence nutritionnelle des valeurs
     */
    private function verifierCoherenceNutritionnelle(int $calories, int $proteines, int $glucides, int $lipides): int
    {
        $score = 0;
        
        // Calcul des calories théoriques à partir des macronutriments
        $caloriesTheoriques = ($proteines * 4) + ($glucides * 4) + ($lipides * 9);
        
        // Vérification de cohérence (plus tolérante)
        if ($calories > 0) {
            $ecartRelatif = abs($calories - $caloriesTheoriques) / $calories;
            
            // Tolérance augmentée et plus intelligente
            if ($ecartRelatif > 1.0) { // Plus de 100% d'écart = incohérence très grave
                $score -= 5;
            } elseif ($ecartRelatif > 0.7) { // 70-100% d'écart = incohérence grave
                $score -= 4;
            } elseif ($ecartRelatif > 0.5) { // 50-70% d'écart = incohérence modérée
                $score -= 2;
            } elseif ($ecartRelatif > 0.3) { // 30-50% d'écart = légère incohérence
                $score -= 1;
            }
            // Moins de 30% d'écart = considéré comme normal
        }

        // Pénalités pour excès calories massifs (plus nuancées)
        if ($calories > 2000) {
            $score -= 4; // Excès très massif
        } elseif ($calories > 1500) {
            $score -= 2; // Excès massif
        } elseif ($calories > 1200) {
            $score -= 1; // Excès important
        }
        // 300-1200 calories = considéré comme normal

        // Bonus pour calories très faibles (rare)
        if ($calories < 200 && $calories > 0) {
            $score -= 1; // Trop peu de calories
        }

        return $score;
    }

    /**
     * Calcule le score des calories selon le moment
     */
    private function calculerScoreCalories(int $calories, TypeMoment $typeMoment): int
    {
        return match($typeMoment) {
            TypeMoment::MATIN => ($calories >= 300 && $calories <= 500) ? 2 : ($calories > 800 ? -3 : -1),
            TypeMoment::MIDI => ($calories >= 500 && $calories <= 800) ? 2 : ($calories > 1200 ? -4 : -2),
            TypeMoment::COLLATION => ($calories >= 100 && $calories <= 200) ? 1 : ($calories > 400 ? -2 : -1),
            TypeMoment::SOIR => ($calories >= 400 && $calories <= 600) ? 2 : ($calories > 900 ? -3 : -1),
        };
    }

    /**
     * Met à jour les points d'un repas avec le score intelligent
     */
    public function mettreAJourPoints(Repas $repas): Repas
    {
        $result = $this->chronoScoreService->evaluateRepas($repas);
        $repas->setPointsGagnes($result['totalScore'] ?? 0);
        return $repas;
    }

    /**
     * Retourne la grille des points par moment
     */
    public function getGrillePoints(): array
    {
        return [
            'Matin (6h-10h)' => '+1 timing',
            'Midi (11h-14h)' => '+1 timing',
            'Collation (9h-11h / 15h-17h)' => '+1 timing',
            'Soir (18h-21h)' => '+1 timing',
        ];
    }

    /**
     * Retourne les détails du calcul pour affichage
     */
    public function getDetailsScore(Repas $repas): array
    {
        $result = $this->chronoScoreService->evaluateRepas($repas);

        return [
            'timing' => $result['timingScore'] ?? 0,
            'nutrition' => $result['nutritionScore'] ?? 0,
            'equilibreBonus' => $result['equilibreBonus'] ?? 0,
            'interaction' => $result['interactionScore'] ?? 0,
            'riskPenalty' => $result['riskPenalty'] ?? 0,
            'statusCode' => $result['statusCode'] ?? null,
            'statusLabel' => $result['statusLabel'] ?? null,
            'total' => $result['totalScore'] ?? 0,
            'heure' => $result['meta']['heure'] ?? $repas->getDateConsommation()->format('H:i'),
            'calories' => $result['meta']['calories'] ?? $repas->getTotalCalories(),
            'proteines' => $result['meta']['proteines'] ?? $repas->getTotalProteines(),
        ];
    }
}
