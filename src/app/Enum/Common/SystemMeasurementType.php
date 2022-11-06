<?php

namespace App\Enum\Common;

enum SystemMeasurementType: string
{
    case ISU = 'isu';
    case BIS = 'bis';
    case USCS = 'uscs';

    public function label(): string
    {
        return match ($this) {
            self::ISU => 'International System of Units',
            self::BIS => 'British imperial system',
            self::USCS => 'United States customary system'
        };
    }
}
