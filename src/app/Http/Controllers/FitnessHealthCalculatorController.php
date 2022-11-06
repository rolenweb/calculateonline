<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\CalculateBmiRequest;
use Illuminate\View\View;

class FitnessHealthCalculatorController extends CalculatorController
{
    public function bmi(CalculateBmiRequest $calculateBmiRequest): View
    {
        dd($calculateBmiRequest->toArray());
        $this->seo()->setTitle('Calculate bmi | bmi chart women | bmi calculator men');
        $this->seo()->setDescription('Free Body Mass Index calculator gives out the BMI value and categorizes BMI based on provided information from WHO and CDC for both adults and children.');
        return view('calculators.fitness_health.bmi');
    }
}
