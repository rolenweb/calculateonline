<?php

namespace App\Enum\Calculator\Finance;

enum CreditCalculationType: string
{
    case CALCULATION_MONTHLY_PAYMENT = 'calculation_monthly_payment';
    case CALCULATION_CREDIT_PERIOD = 'calculation_credit_period';
    case CALCULATION_MAX_CREDIT_AMOUNT = 'calculation_max_credit_amount';

    public function label(): string
    {
        return match ($this) {
            self::CALCULATION_MONTHLY_PAYMENT => 'Расчет ежемесячного платежа',
            self::CALCULATION_CREDIT_PERIOD => 'Расчет срока кредита',
            self::CALCULATION_MAX_CREDIT_AMOUNT => 'Расчет максимальной суммы кредита'
        };
    }
}
