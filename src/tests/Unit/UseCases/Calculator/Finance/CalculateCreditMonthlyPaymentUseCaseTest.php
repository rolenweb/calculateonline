<?php

declare(strict_types=1);

namespace Tests\Unit\UseCases\Calculator\Finance;

use App\Enum\Calculator\Finance\CreditMonthlyPaymentType;
use App\Enum\Calculator\Finance\CreditPeriodType;
use App\UseCases\Calculator\Finance\CalculateCreditMonthlyPaymentUseCase;
use App\UseCases\Calculator\Finance\Dto\CalculateCreditMonthlyPaymentDto;
use Tests\TestCase;

class CalculateCreditMonthlyPaymentUseCaseTest extends TestCase
{
    private CalculateCreditMonthlyPaymentUseCase $useCase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->useCase = $this->app->make(CalculateCreditMonthlyPaymentUseCase::class);
    }

    public function testCalculateCreditMonthlyPaymentUseCase()
    {
        $dto = new CalculateCreditMonthlyPaymentDto(
            100000,
            10,
            CreditPeriodType::YEAR,
            10,
            CreditMonthlyPaymentType::ANNUITY_PAYMENT
        );
        $result = $this->useCase->handle($dto);
        $this->assertEquals(833.33, round($result->first()->getInterest(), 2));
        $this->assertEquals(488.17, round($result->first()->getPrincipal(), 2));
        $this->assertEquals(1321.51, round($result->first()->getPayment(), 2));
        $this->assertEquals(99511.83, round($result->first()->getBalance(), 2));
        $this->assertEquals((new \DateTime())->format('Y-m-d'), $result->first()->getMonth()->format('Y-m-d'));
        $this->assertEquals(120, $result->count());
        $this->assertEquals(10.92, round($result->last()->getInterest(), 2));
        $this->assertEquals(1310.59, round($result->last()->getPrincipal(), 2));
        $this->assertEquals((new \DateTime())->add(new \DateInterval('P119M'))->format('Y-m-d'), $result->last()->getMonth()->format('Y-m-d'));
    }
}
