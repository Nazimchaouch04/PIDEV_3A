<?php
namespace App\Service;

use App\Entity\Exercice;
use App\Enum\Intensite;

class ExerciceManager
{
    public function validate(Exercice $exercice): bool
    {
        if (empty($exercice->getNomExercice())) {
            throw new \InvalidArgumentException('Le nom est obligatoire');
        }

        if ($exercice->getCaloriesParMinute() !== null 
            && $exercice->getCaloriesParMinute() <= 0) {
            throw new \InvalidArgumentException('Les calories doivent être supérieures à 0');
        }

        return true;
    }

    public function calculerCaloriesTotales(float $caloriesParMinute, int $dureeMinutes): float
    {
        if ($dureeMinutes <= 0) {
            throw new \InvalidArgumentException('La durée doit être positive');
        }
        return $caloriesParMinute * $dureeMinutes;
    }

    public function estExerciceIntense(Intensite $intensite): bool
    {
        return in_array($intensite->value, ['élevée', 'extreme', 'Élevée', 'Extreme', 'ELEVEE', 'EXTREME']);
    }
}