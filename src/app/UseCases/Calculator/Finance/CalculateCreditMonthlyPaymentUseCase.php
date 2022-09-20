<?php

declare(strict_types=1);

namespace App\UseCases\Calculator\Finance;

use App\Enum\Calculator\Finance\CreditMonthlyPaymentType;
use App\Enum\Calculator\Finance\CreditPeriodType;
use App\UseCases\Calculator\Finance\Dto\CalculateCreditMonthlyPaymentDto;
use App\UseCases\Calculator\Finance\View\CalculateCreditView;
use App\UseCases\Calculator\Finance\View\MonthlyPaymentView;
use DateTimeImmutable;

class CalculateCreditMonthlyPaymentUseCase
{
    /**
     * @param CalculateCreditMonthlyPaymentDto $dto
     * @return CalculateCreditView
     */
    public function handle(CalculateCreditMonthlyPaymentDto $dto): CalculateCreditView
    {
        if ($dto->getMonthlyPaymentType() === CreditMonthlyPaymentType::ANNUITY_PAYMENT) {
            return $this->calculateAnnuityPayment($dto);
        }

        return $this->calculateDifferentiatedPayment($dto);
    }

    /**
     * @param CalculateCreditMonthlyPaymentDto $dto
     * @return CalculateCreditView
     */
    private function calculateAnnuityPayment(CalculateCreditMonthlyPaymentDto $dto): CalculateCreditView
    {
        $s = $dto->getAmount();
        $p = $this->monthlyInterestRate($dto->getPercent()) / 100;
        $n = $this->periodInMonths($dto->getPeriodType(), $dto->getPeriod());
        $monthlyPayment = $this->calculateMonthlyAnnuityPayment($s, $p, $n);
        $month = new DateTimeImmutable();
        $interest = $s * $p;
        $principal = $monthlyPayment - $interest;
        $balance = $s - $principal;
        $firstMonthPayment = new MonthlyPaymentView(
            $month,
            $principal,
            $interest,
            $balance
        );
        $result = new CalculateCreditView([$firstMonthPayment]);
        $n--;
        while ($n > 0) {
            $monthlyPayment = $this->calculateMonthlyAnnuityPayment($balance, $p, $n);
            $interest = $balance * $p;
            $principal = $monthlyPayment - $interest;
            $balance -= $principal;
            $month = $month->add(new \DateInterval('P1M'));
            $monthlyPaymentView = new MonthlyPaymentView(
                $month,
                $principal,
                $interest,
                $balance
            );
            $result->add($monthlyPaymentView);
            $n--;
        }

        return $result;
    }

    /**
     * @param float $s Amount
     * @param float $p Interest rate
     * @param int $n N months
     * @return float
     */
    private function calculateMonthlyAnnuityPayment(float $s, float $p, int $n): float
    {
        return $s * ($p + $p / (pow(1 + $p, $n) - 1));
    }

    private function calculateDifferentiatedPayment(CalculateCreditMonthlyPaymentDto $dto): CalculateCreditView
    {
        return new CalculateCreditView();
    }

    /**
     * @param float $yearlyRate
     * @return float
     */
    private function monthlyInterestRate(float $yearlyRate): float
    {
        return $yearlyRate / 12;
    }

    /**
     * @param CreditPeriodType $creditPeriodType
     * @param int $period
     * @return int
     */
    private function periodInMonths(CreditPeriodType $creditPeriodType, int $period): int
    {
        if ($creditPeriodType === CreditPeriodType::YEAR) {
            return $period * 12;
        }
        return $period;
    }
}
