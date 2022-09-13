<?php

declare(strict_types=1);

namespace App\UseCases\Calculator\Finance;

use App\Enum\Calculator\Finance\VatType;
use App\UseCases\Calculator\Finance\Dto\CalculateVatDto;

class CalculateVatUseCase
{
    /**
     * @param CalculateVatDto $dto
     * @return float
     */
    public function handle(CalculateVatDto $dto): float
    {
        if ($dto->getVatType() === VatType::ADD_VAT) {
            return $this->addVat($dto->getValue(), $dto->getPercent());
        }
        return $this->allocateVat($dto->getValue(), $dto->getPercent());
    }

    /**
     * @param float $value
     * @param float $percent
     * @return float
     */
    private function addVat(float $value, float $percent): float
    {
        return $value * $percent / 100;
    }

    /**
     * @param float $value
     * @param float $percent
     * @return float
     */
    private function allocateVat(float $value, float $percent): float
    {
        return $value / (100 + $percent) * $percent;
    }
}
