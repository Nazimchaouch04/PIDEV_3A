<?php

namespace App\Service;

use App\Entity\Repas;
use App\Entity\Utilisateur;
use App\Enum\TypeMoment;

class ChronoScoreService
{
    /**
     * Calcule le score chronobiologique complet pour un repas.
     *
     * Retourne un tableau structuré prêt à être affiché dans les templates.
     */
    public function evaluateRepas(Repas $repas): array
    {
        $calories  = $repas->getTotalCalories();
        $proteines = $repas->getTotalProteines();
        $glucides  = $repas->getTotalGlucides();
        $lipides   = $repas->getTotalLipides();
        $typeMoment = $repas->getTypeMoment();
        $date       = $repas->getDateConsommation();

        $timing = $this->computeDynamicTimingScore($date, $typeMoment);
        $nutrition = $this->computeNutritionScore($calories, $proteines, $glucides, $lipides, $typeMoment);
        $equilibreBonus = $this->computeEquilibreBonus($calories, $proteines, $glucides, $lipides);
        $interaction = $this->computeInteractionAdjustment($timing['score'], $nutrition['score'], $calories, $typeMoment, $date);
        $risk = $this->detectMetabolicRisk($timing['score'], $nutrition['score'], $calories, $lipides, $typeMoment, $date);

        $total = $timing['score'] + $nutrition['score'] + $equilibreBonus['bonus'] + $interaction['adjustment'] + $risk['penalty'];
        $total = (int) round(max($total, -20));

        $status = $this->buildQualitativeStatus($total, $risk['hasRisk']);

        return [
            'totalScore' => $total,
            'timingScore' => $timing['score'],
            'nutritionScore' => $nutrition['score'],
            'equilibreBonus' => $equilibreBonus['bonus'],
            'interactionScore' => $interaction['adjustment'],
            'riskPenalty' => $risk['penalty'],
            'hasRisk' => $risk['hasRisk'],
            'riskMessage' => $risk['message'],
            'statusCode' => $status['code'],
            'statusLabel' => $status['label'],
            'messages' => array_merge(
                $timing['messages'],
                $nutrition['messages'],
                $equilibreBonus['messages'],
                $interaction['messages'],
                $risk['messages'],
            ),
            'meta' => [
                'heure' => $date->format('H:i'),
                'calories' => $calories,
                'proteines' => $proteines,
                'glucides' => $glucides,
                'lipides' => $lipides,
                'typeMoment' => $typeMoment->value,
            ],
        ];
    }

    /**
     * Analyse une semaine de repas pour détecter une tendance de mauvais timing.
     *
     * @param Repas[] $repasSemaine
     */
    public function analyzeWeeklyTrend(array $repasSemaine, ?Repas $repasReference = null): array
    {
        if (count($repasSemaine) === 0) {
            return [
                'hasWarning' => false,
                'label' => null,
                'details' => null,
            ];
        }

        $badTimingCount = 0;
        $lateDinerCount = 0;

        foreach ($repasSemaine as $repas) {
            $timing = $this->computeDynamicTimingScore($repas->getDateConsommation(), $repas->getTypeMoment());
            if ($timing['score'] < 0) {
                $badTimingCount++;
            }

            $hour = (int) $repas->getDateConsommation()->format('H');
            if ($repas->getTypeMoment() === TypeMoment::SOIR && $hour >= 22) {
                $lateDinerCount++;
            }
        }

        // Seuils simples : 3 mauvais timings ou 2 dîners très tardifs dans la même semaine
        if ($badTimingCount >= 3 || $lateDinerCount >= 2) {
            $label = 'Habitude chronobiologique non optimale';
            $details = sprintf(
                'Cette semaine, %d repas présentent un mauvais timing dont %d dîners très tardifs.',
                $badTimingCount,
                $lateDinerCount
            );

            if ($repasReference) {
                $details .= sprintf(
                    ' Le repas "%s" du %s fait partie de ce schéma.',
                    $repasReference->getTitreRepas(),
                    $repasReference->getDateConsommation()->format('d/m/Y H:i')
                );
            }

            return [
                'hasWarning' => true,
                'label' => $label,
                'details' => $details,
            ];
        }

        return [
            'hasWarning' => false,
            'label' => null,
            'details' => null,
        ];
    }

    /**
     * Calcul dynamique du timing : bonus si dans la plage idéale,
     * pénalité proportionnelle à l'écart en heures sinon.
     */
    private function computeDynamicTimingScore(\DateTimeInterface $date, TypeMoment $typeMoment): array
    {
        $hour = (int) $date->format('H');
        $minute = (int) $date->format('i');
        $timeDecimal = $hour + $minute / 60.0;

        // Définition des plages idéales (en heures) par moment
        $windows = match ($typeMoment) {
            TypeMoment::MATIN => ['start' => 6.0, 'end' => 10.0],
            TypeMoment::MIDI => ['start' => 11.0, 'end' => 14.0],
            TypeMoment::COLLATION => ['start' => 9.0, 'end' => 17.0], // regroupe collations
            TypeMoment::SOIR => ['start' => 18.0, 'end' => 21.0],
        };

        $start = $windows['start'];
        $end   = $windows['end'];

        // Distance (en heures) par rapport à la plage idéale
        if ($timeDecimal >= $start && $timeDecimal <= $end) {
            $diff = 0.0;
        } elseif ($timeDecimal < $start) {
            $diff = $start - $timeDecimal;
        } else {
            $diff = $timeDecimal - $end;
        }

        // Score de base : 4 points dans la plage idéale, pénalité progressive sinon
        $rawScore = 4.0 - (1.5 * $diff);

        // Bonus ou malus additionnel pour les cas extrêmes
        if ($typeMoment === TypeMoment::SOIR && $timeDecimal >= 22.0) {
            $rawScore -= 2.0; // dîner très tardif
        }

        $score = (int) round(max($rawScore, -6.0));

        $messages = [];
        if ($diff === 0.0) {
            $messages[] = 'Timing optimal pour ce type de repas (+4 points).';
        } elseif ($diff <= 1.0) {
            $messages[] = 'Léger décalage horaire, impact limité sur le score de timing.';
        } elseif ($diff <= 3.0) {
            $messages[] = 'Décalage modéré par rapport à la plage idéale, pénalité de timing appliquée.';
        } else {
            $messages[] = 'Timing très éloigné de la plage idéale, forte pénalité de timing.';
        }

        if ($typeMoment === TypeMoment::SOIR && $timeDecimal >= 22.0) {
            $messages[] = 'Repas du soir très tardif (après 22h), impact négatif supplémentaire.';
        }

        return [
            'score' => $score,
            'messages' => $messages,
        ];
    }

    /**
     * Score nutritionnel global (reprend et enrichit l’ancienne logique de RepasService).
     */
    private function computeNutritionScore(int $calories, int $proteines, int $glucides, int $lipides, TypeMoment $typeMoment): array
    {
        $score = 0;
        $messages = [];

        // Cohérence macro -> calories théoriques
        $caloriesTheoriques = ($proteines * 4) + ($glucides * 4) + ($lipides * 9);
        if ($calories > 0) {
            $ecartRelatif = abs($calories - $caloriesTheoriques) / $calories;

            if ($ecartRelatif > 1.0) {
                $score -= 5;
                $messages[] = 'Incohérence très importante entre les macros et les calories (-5).';
            } elseif ($ecartRelatif > 0.7) {
                $score -= 4;
                $messages[] = 'Incohérence importante entre les macros et les calories (-4).';
            } elseif ($ecartRelatif > 0.5) {
                $score -= 2;
                $messages[] = 'Incohérence modérée entre les macros et les calories (-2).';
            } elseif ($ecartRelatif > 0.3) {
                $score -= 1;
                $messages[] = 'Légère incohérence entre les macros et les calories (-1).';
            }
        }

        // Calories selon le moment (repris / adapté)
        $scoreCaloriesMoment = match ($typeMoment) {
            TypeMoment::MATIN => ($calories >= 300 && $calories <= 500) ? 2 : ($calories > 800 ? -3 : -1),
            TypeMoment::MIDI => ($calories >= 500 && $calories <= 800) ? 2 : ($calories > 1200 ? -4 : -2),
            TypeMoment::COLLATION => ($calories >= 100 && $calories <= 200) ? 1 : ($calories > 400 ? -2 : -1),
            TypeMoment::SOIR => ($calories >= 400 && $calories <= 600) ? 2 : ($calories > 900 ? -3 : -1),
        };
        $score += $scoreCaloriesMoment;

        if ($scoreCaloriesMoment > 0) {
            $messages[] = 'Calories adaptées au moment de la journée.';
        } elseif ($scoreCaloriesMoment < 0) {
            $messages[] = 'Calories peu adaptées au moment de la journée.';
        }

        // Bonus pour protéines
        if ($proteines >= 30) {
            $score += 3;
            $messages[] = 'Apport protéique excellent (+3).';
        } elseif ($proteines >= 15) {
            $score += 2;
            $messages[] = 'Bon apport protéique (+2).';
        } elseif ($proteines >= 8) {
            $score += 1;
            $messages[] = 'Apport protéique satisfaisant (+1).';
        } else {
            $score -= 1;
            $messages[] = 'Apport protéique insuffisant (-1).';
        }

        // Glucides
        if ($glucides >= 40 && $glucides <= 70) {
            $score += 1;
            $messages[] = 'Glucides modérés et équilibrés (+1).';
        } elseif ($glucides > 100) {
            $score -= 2;
            $messages[] = 'Excès de glucides (>100g) (-2).';
        }

        // Lipides
        if ($lipides >= 10 && $lipides <= 25) {
            $score += 1;
            $messages[] = 'Lipides modérés et équilibrés (+1).';
        } elseif ($lipides > 40) {
            $score -= 2;
            $messages[] = 'Excès de lipides (>40g) (-2).';
        }

        // Ratios d'équilibre
        if ($calories > 0) {
            $ratioProteines = ($proteines * 4 / $calories) * 100;
            $ratioGlucides  = ($glucides * 4 / $calories) * 100;
            $ratioLipides   = ($lipides * 9 / $calories) * 100;

            if ($ratioProteines >= 20 && $ratioProteines <= 35) {
                $score += 1;
                $messages[] = 'Bon ratio protéines/calories (+1).';
            }
            if ($ratioGlucides >= 40 && $ratioGlucides <= 60) {
                $score += 1;
                $messages[] = 'Bon ratio glucides/calories (+1).';
            }
            if ($ratioLipides >= 20 && $ratioLipides <= 35) {
                $score += 1;
                $messages[] = 'Bon ratio lipides/calories (+1).';
            }
        }

        return [
            'score' => $score,
            'messages' => $messages,
        ];
    }

    /**
     * Bonus d’équilibre nutritionnel qualitatif.
     */
    private function computeEquilibreBonus(int $calories, int $proteines, int $glucides, int $lipides): array
    {
        $bonus = 0;
        $messages = [];

        if ($calories <= 0) {
            return ['bonus' => 0, 'messages' => []];
        }

        $proteinesOk = $proteines >= 20;
        $caloriesModerees = $calories >= 400 && $calories <= 800;
        $glucidesOk = $glucides >= 30 && $glucides <= 80;
        $lipidesOk = $lipides >= 8 && $lipides <= 25;

        if ($proteinesOk && $caloriesModerees && $glucidesOk && $lipidesOk) {
            $bonus += 2;
            $messages[] = 'Repas bien équilibré (protéines suffisantes et calories modérées) (+2).';
        } elseif ($proteinesOk && $caloriesModerees) {
            $bonus += 1;
            $messages[] = 'Bon équilibre global protéines / calories (+1).';
        }

        return [
            'bonus' => $bonus,
            'messages' => $messages,
        ];
    }

    /**
     * Interaction entre timing et nutrition (bonus ou malus global).
     */
    private function computeInteractionAdjustment(int $timingScore, int $nutritionScore, int $calories, TypeMoment $typeMoment, \DateTimeInterface $date): array
    {
        $adjustment = 0;
        $messages = [];

        $hour = (int) $date->format('H');

        $bonneNutrition = $nutritionScore >= 4;
        $bonTiming = $timingScore >= 3;

        if ($bonneNutrition && $bonTiming) {
            $adjustment += 2;
            $messages[] = 'Excellent alignement entre timing et qualité nutritionnelle (+2).';
        }

        // Repas très calorique tard le soir
        if ($typeMoment === TypeMoment::SOIR && $calories > 900 && $hour >= 21) {
            $adjustment -= 3;
            $messages[] = 'Repas très calorique consommé tard le soir (-3).';
        }

        return [
            'adjustment' => $adjustment,
            'messages' => $messages,
        ];
    }

    /**
     * Détection de risque métabolique : combinaison de plusieurs facteurs négatifs.
     */
    private function detectMetabolicRisk(int $timingScore, int $nutritionScore, int $calories, int $lipides, TypeMoment $typeMoment, \DateTimeInterface $date): array
    {
        $hasRisk = false;
        $penalty = 0;
        $messages = [];
        $messageSynthese = null;

        $hour = (int) $date->format('H');

        $badTiming = $timingScore <= -2;
        $excesCalories = $calories > 1200;
        $lipidesEleves = $lipides > 40;
        $lateDiner = $typeMoment === TypeMoment::SOIR && $hour >= 22;

        $negativeFactors = 0;
        foreach ([$badTiming, $excesCalories, $lipidesEleves, $lateDiner] as $flag) {
            if ($flag) {
                $negativeFactors++;
            }
        }

        if ($negativeFactors >= 3) {
            $hasRisk = true;
            $penalty = -4;
            $messageSynthese = 'Plusieurs facteurs défavorables combinés (timing, calories, lipides, horaire), risque métabolique accru (-4).';
            $messages[] = $messageSynthese;
        }

        return [
            'hasRisk' => $hasRisk,
            'penalty' => $penalty,
            'message' => $messageSynthese,
            'messages' => $messages,
        ];
    }

    /**
     * Statut qualitatif global basé sur le score et le risque détecté.
     */
    private function buildQualitativeStatus(int $totalScore, bool $hasRisk): array
    {
        if ($hasRisk) {
            return [
                'code' => 'risque_metabolique',
                'label' => 'Risque métabolique',
            ];
        }

        if ($totalScore >= 10) {
            return [
                'code' => 'excellent',
                'label' => 'Excellent alignement chronobiologique',
            ];
        }

        if ($totalScore >= 4) {
            return [
                'code' => 'modere',
                'label' => 'Alignement chronobiologique modéré',
            ];
        }

        if ($totalScore >= 0) {
            return [
                'code' => 'desequilibre',
                'label' => 'Déséquilibre nutritionnel à surveiller',
            ];
        }

        return [
            'code' => 'risque_metabolique',
            'label' => 'Risque métabolique',
        ];
    }
}

