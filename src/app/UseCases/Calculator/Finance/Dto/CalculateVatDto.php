<?php

declare(strict_types=1);

namespace App\UseCases\Calculator\Finance\Dto;

use App\Enum\Calculator\Finance\VatType;

class CalculateVatDto
{
    private float $value;

    private float $percent;

    private VatType $vatType;

    /**
     * @param float $value
     * @param float $percent
     * @param VatType $vatType
     */
    public function __construct(float $value, float $percent, VatType $vatType)
    {
        $this->value = $value;
        $this->percent = $percent;
        $this->vatType = $vatType;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @return float
     */
    public function getPercent(): float
    {
        return $this->percent;
    }

    /**
     * @return VatType
     */
    public function getVatType(): VatType
    {
        return $this->vatType;
    }
}
