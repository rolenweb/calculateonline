<?php

namespace App\Enum\Calculator\Finance;

enum CreditPeriodType: string
{
    case YEAR = 'year';
    case MONTH = 'month';

    public function label(): string
    {
        return match ($this) {
            self::YEAR => 'лет',
            self::MONTH => 'месяцев'
        };
    }
}
