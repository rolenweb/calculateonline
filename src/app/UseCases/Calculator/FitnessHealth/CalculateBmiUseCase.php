<?php

declare(strict_types=1);

namespace App\UseCases\Calculator\FitnessHealth;

use App\Enum\Calculator\FitnessHealth\BmiUnitType;
use App\Enum\Common\SystemMeasurementType;
use App\UseCases\Calculator\FitnessHealth\Dto\CalculateBmiDto;
use App\UseCases\Calculator\FitnessHealth\View\CalculateBmiView;

class CalculateBmiUseCase
{
    /**
     * @param CalculateBmiDto $dto
     * @return CalculateBmiView
     */
    public function handle(CalculateBmiDto $dto): CalculateBmiView
    {
        if ($dto->getSystemMeasurement() == SystemMeasurementType::ISU) {
            return $this->calculateUsingInternationalSystemUnits($dto);
        }

        $bmi = 703 * $dto->getWeight() / $dto->getHeight() / $dto->getHeight();

        return new CalculateBmiView($bmi, BmiUnitType::BIS);
    }

    /**
     * @param CalculateBmiDto $dto
     * @return CalculateBmiView
     */
    private function calculateUsingInternationalSystemUnits(CalculateBmiDto $dto): CalculateBmiView
    {
        $bmi = $dto->getWeight() / $dto->getHeight() / $dto->getHeight() * 10000;

        return new CalculateBmiView($bmi, BmiUnitType::ISU);
    }

}
