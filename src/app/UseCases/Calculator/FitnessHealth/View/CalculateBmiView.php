<?php

declare(strict_types=1);

namespace App\UseCases\Calculator\FitnessHealth\View;


use App\Enum\Calculator\FitnessHealth\BmiUnitType;

class CalculateBmiView
{
    private float $bmi;

    private BmiUnitType $bmiUnitType;

    /**
     * @param float $bmi
     * @param BmiUnitType $bmiUnitType
     */
    public function __construct(float $bmi, BmiUnitType $bmiUnitType)
    {
        $this->bmi = $bmi;
        $this->bmiUnitType = $bmiUnitType;
    }

    /**
     * @return float
     */
    public function getBmi(): float
    {
        return $this->bmi;
    }

    /**
     * @return BmiUnitType
     */
    public function getBmiUnitType(): BmiUnitType
    {
        return $this->bmiUnitType;
    }
}
