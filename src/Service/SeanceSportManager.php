<?php
namespace App\Service;

use App\Entity\SeanceSport;

class SeanceSportManager
{
    public function validate(SeanceSport $seance): bool
    {
        if (empty($seance->getNomSeance()) || strlen($seance->getNomSeance()) < 2) {
            throw new \InvalidArgumentException('Le nom doit avoir au moins 2 caractères');
        }

        if ($seance->getDureeMinutes() !== null && $seance->getDureeMinutes() <= 0) {
            throw new \InvalidArgumentException('La durée doit être supérieure à 0');
        }

        if ($seance->getDureeMinutes() !== null && $seance->getDureeMinutes() % 5 !== 0) {
            throw new \InvalidArgumentException('La durée doit être un multiple de 5');
        }

        return true;
    }

    public function calculerNiveauMedaille(int $duree): string
    {
        if ($duree >= 120) return 'Or';
        if ($duree >= 60)  return 'Argent';
        if ($duree >= 30)  return 'Bronze';
        return 'Aucune';
    }

    public function estSeanceLongue(int $duree): bool
    {
        return $duree >= 60;
    }
}