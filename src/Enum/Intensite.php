<?php

namespace App\Enum;

enum Intensite: string
{
    case FAIBLE = 'faible';
    case MODEREE = 'moderee';
    case ELEVEE = 'elevee';

    public function label(): string
    {
        return match($this) {
            self::FAIBLE => 'Faible',
            self::MODEREE => 'Moderee',
            self::ELEVEE => 'Elevee',
        };
    }
}
