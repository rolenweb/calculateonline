<?php

declare(strict_types=1);

namespace App\UseCases\Calculator\Finance\View;

use Webmozart\Assert\Assert;

class CalculateCreditView
{
    /**
     * @var MonthlyPaymentView[]
     */
    private array $monthlyPayments;

    /**
     * @param array $monthlyPayments
     */
    public function __construct(array $monthlyPayments)
    {
        Assert::greaterThan(count($monthlyPayments), 0);
        $this->monthlyPayments = $monthlyPayments;
    }

    /**
     * @return array
     */
    public function getMonthlyPayments(): array
    {
        return $this->monthlyPayments;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->monthlyPayments);
    }

    /**
     * @return MonthlyPaymentView
     */
    public function first(): MonthlyPaymentView
    {
        return $this->monthlyPayments[0];
    }

    /**
     * @return MonthlyPaymentView
     */
    public function last(): MonthlyPaymentView
    {
        return $this->monthlyPayments[$this->count() - 1];
    }

    /**
     * @param MonthlyPaymentView $monthlyPaymentView
     * @return void
     */
    public function add(MonthlyPaymentView $monthlyPaymentView): void
    {
        $this->monthlyPayments[] = $monthlyPaymentView;
    }
}
