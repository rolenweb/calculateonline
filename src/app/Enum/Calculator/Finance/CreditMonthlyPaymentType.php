<?php

namespace App\Enum\Calculator\Finance;

enum CreditMonthlyPaymentType: string
{
    case ANNUITY_PAYMENT = 'annuity_payment';
    case DIFFERENTIATED_PAYMENT = 'differentiated_payment';

    public function label(): string
    {
        return match ($this) {
            self::ANNUITY_PAYMENT => 'Аннуитетные',
            self::DIFFERENTIATED_PAYMENT => 'Дифференцированные'
        };
    }
}
