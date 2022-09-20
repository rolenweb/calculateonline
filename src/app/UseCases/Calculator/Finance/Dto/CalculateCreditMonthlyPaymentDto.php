<?php

declare(strict_types=1);

namespace App\UseCases\Calculator\Finance\Dto;

use App\Enum\Calculator\Finance\CreditMonthlyPaymentType;
use App\Enum\Calculator\Finance\CreditPeriodType;

class CalculateCreditMonthlyPaymentDto
{
    private float $amount;

    private int $period;

    private CreditPeriodType $periodType;

    private float $percent;

    private CreditMonthlyPaymentType $monthlyPaymentType;

    /**
     * @param float $amount
     * @param int $period
     * @param CreditPeriodType $periodType
     * @param float $percent
     * @param CreditMonthlyPaymentType $monthlyPaymentType
     */
    public function __construct(
        float $amount,
        int $period,
        CreditPeriodType $periodType,
        float $percent,
        CreditMonthlyPaymentType $monthlyPaymentType
    ) {
        $this->amount = $amount;
        $this->period = $period;
        $this->periodType = $periodType;
        $this->percent = $percent;
        $this->monthlyPaymentType = $monthlyPaymentType;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @return int
     */
    public function getPeriod(): int
    {
        return $this->period;
    }

    /**
     * @return CreditPeriodType
     */
    public function getPeriodType(): CreditPeriodType
    {
        return $this->periodType;
    }

    /**
     * @return float
     */
    public function getPercent(): float
    {
        return $this->percent;
    }

    /**
     * @return CreditMonthlyPaymentType
     */
    public function getMonthlyPaymentType(): CreditMonthlyPaymentType
    {
        return $this->monthlyPaymentType;
    }
}
