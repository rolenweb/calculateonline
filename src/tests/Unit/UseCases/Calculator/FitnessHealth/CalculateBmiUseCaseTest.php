<?php

declare(strict_types=1);

namespace Tests\Unit\UseCases\Calculator\FitnessHealth;

use App\Enum\Common\GenderType;
use App\Enum\Common\SystemMeasurementType;
use App\UseCases\Calculator\FitnessHealth\CalculateBmiUseCase;
use App\UseCases\Calculator\FitnessHealth\Dto\CalculateBmiDto;
use Tests\TestCase;

class CalculateBmiUseCaseTest extends TestCase
{
    private CalculateBmiUseCase $calculateBmiUseCase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->calculateBmiUseCase = $this->app->make(CalculateBmiUseCase::class);
    }

    public function testCanCalculateBmiUsingInternationalSystemOfUnits()
    {
        $dto = new CalculateBmiDto(
            SystemMeasurementType::ISU,
            39,
            GenderType::MALE,
            183,
            100
        );

        $bmi = $this->calculateBmiUseCase->handle($dto);

        $this->assertEquals(29.9, round($bmi->getBmi(), 1));
        $this->assertEquals('kg/m2', $bmi->getBmiUnitType()->value);
    }

    public function testCanCalculateBmiUsingUnitedStatesCustomarySystemOfUnits()
    {
        $dto = new CalculateBmiDto(
            SystemMeasurementType::USCS,
            39,
            GenderType::MALE,
            72,
            220.5
        );

        $bmi = $this->calculateBmiUseCase->handle($dto);

        $this->assertEquals(29.9, round($bmi->getBmi(), 1));
        $this->assertEquals('lb/in2', $bmi->getBmiUnitType()->value);
    }

    public function testCanCalculateBmiUsingBritishSystemOfUnits()
    {
        $dto = new CalculateBmiDto(
            SystemMeasurementType::BIS,
            39,
            GenderType::MALE,
            72,
            220.5
        );

        $bmi = $this->calculateBmiUseCase->handle($dto);

        $this->assertEquals(29.9, round($bmi->getBmi(), 1));
        $this->assertEquals('lb/in2', $bmi->getBmiUnitType()->value);
    }


}
