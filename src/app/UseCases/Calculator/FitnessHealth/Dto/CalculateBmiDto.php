<?php

declare(strict_types=1);

namespace App\UseCases\Calculator\FitnessHealth\Dto;

use App\Enum\Common\GenderType;
use App\Enum\Common\SystemMeasurementType;

class CalculateBmiDto
{
    private SystemMeasurementType $systemMeasurement;
    private int $age;
    private GenderType $gender;
    private float $height;
    private float $weight;

    /**
     * @param SystemMeasurementType $systemMeasurement
     * @param int $age
     * @param GenderType $gender
     * @param float $height
     * @param float $weight
     */
    public function __construct(
        SystemMeasurementType $systemMeasurement,
        int $age,
        GenderType $gender,
        float $height,
        float $weight
    ) {
        $this->systemMeasurement = $systemMeasurement;
        $this->age = $age;
        $this->gender = $gender;
        $this->height = $height;
        $this->weight = $weight;
    }

    /**
     * @return SystemMeasurementType
     */
    public function getSystemMeasurement(): SystemMeasurementType
    {
        return $this->systemMeasurement;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return GenderType
     */
    public function getGender(): GenderType
    {
        return $this->gender;
    }

    /**
     * @return float
     */
    public function getHeight(): float
    {
        return $this->height;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }
}
