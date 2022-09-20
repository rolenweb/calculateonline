<?php

declare(strict_types=1);

namespace App\UseCases\Calculator\Finance\View;

use DateTimeImmutable;

class MonthlyPaymentView
{
    private DateTimeImmutable $month;

    private float $principal;

    private float $interest;

    private float $balance;

    /**
     * @param DateTimeImmutable $month
     * @param float $principal
     * @param float $interest
     * @param float $balance
     */
    public function __construct(DateTimeImmutable $month, float $principal, float $interest, float $balance)
    {
        $this->month = $month;
        $this->principal = $principal;
        $this->interest = $interest;
        $this->balance = $balance;
    }

    /**
     * @return DateTimeImmutable
     */
    public function getMonth(): DateTimeImmutable
    {
        return $this->month;
    }

    /**
     * @return float
     */
    public function getPrincipal(): float
    {
        return $this->principal;
    }

    /**
     * @return float
     */
    public function getInterest(): float
    {
        return $this->interest;
    }

    /**
     * @return float
     */
    public function getBalance(): float
    {
        return $this->balance;
    }

    public function getPayment(): float
    {
        return $this->principal + $this->interest;
    }
}
