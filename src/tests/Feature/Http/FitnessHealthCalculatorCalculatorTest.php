<?php

declare(strict_types=1);

namespace Tests\Feature\Http;

class FitnessHealthCalculatorCalculatorTest extends TestSeo
{
    public function testBmiCalculatorPageReturnOk(): void
    {
        $response = $this->get('/bmi-calculator');

        $response->assertStatus(200);
    }

    public function testBmiPageHasCorrectTitle()
    {
        $response = $this->get('/bmi-calculator');

        $this->crawler->addContent($response->getContent());

        $this->assertEquals('Calculate bmi | bmi chart women | bmi calculator men', $this->getTitle());
    }

    public function testBmiPageHasCorrectDescription()
    {
        $response = $this->get('/bmi-calculator');

        $this->crawler->addContent($response->getContent());

        $this->assertEquals(
            'Free Body Mass Index calculator gives out the BMI value and categorizes BMI based on provided information from WHO and CDC for both adults and children.',
            $this->getDescription()
        );
    }

    public function testBmiPageHasCorrectCanonicalUrl()
    {
        $response = $this->get('/bmi-calculator');

        $this->crawler->addContent($response->getContent());

        $this->assertEquals(env('APP_URL') . '/bmi-calculator', $this->getCanonicalUrl());
    }
}
