<?php

namespace App\Enum;

enum TypeMoment: string
{
    case MATIN = 'matin';
    case MIDI = 'midi';
    case COLLATION = 'collation';
    case SOIR = 'soir';

    public function label(): string
    {
        return match($this) {
            self::MATIN => 'Petit-dejeuner',
            self::MIDI => 'Dejeuner',
            self::COLLATION => 'Collation',
            self::SOIR => 'Diner',
        };
    }
}
