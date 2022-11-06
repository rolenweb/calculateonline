<?php

namespace App\Enum\Calculator\FitnessHealth;

enum BmiUnitType: string
{
    case ISU = 'kg/m2';
    case BIS = 'lb/in2';

    public function label(): string
    {
        return match ($this) {
            self::ISU => 'International System of Units',
            self::BIS => 'British imperial system',
        };
    }
}
