<?php

namespace App\Enum;

enum Intensite: string
{
    case FAIBLE  = 'Faible';
    case MODEREE = 'Moyenne';
    case ELEVEE  = 'Élevée';

    public function label(): string
    {
        return match($this) {
            self::FAIBLE  => 'Faible',
            self::MODEREE => 'Moyenne',
            self::ELEVEE  => 'Élevée',
        };
    }
}