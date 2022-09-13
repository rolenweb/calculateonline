<?php

declare(strict_types=1);

namespace Tests\Unit\UseCases\Calculator\Finance;

use App\Enum\Calculator\Finance\VatType;
use App\UseCases\Calculator\Finance\CalculateVatUseCase;
use App\UseCases\Calculator\Finance\Dto\CalculateVatDto;
use Tests\TestCase;

class CalculateVatUseCaseTest extends TestCase
{
    private CalculateVatUseCase $useCase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->useCase = $this->app->make(CalculateVatUseCase::class);
    }

    public function testCalculateAddingVat()
    {
        $dto = new CalculateVatDto(1000, 18, VatType::ADD_VAT);
        $this->assertEquals(180.0, $this->useCase->handle($dto));
    }

    public function testCalculateAllocatingVat()
    {
        $dto = new CalculateVatDto(1000, 18, VatType::ALLOCATE_VAT);
        $this->assertEquals(152.54, round($this->useCase->handle($dto), 2));
    }
}
