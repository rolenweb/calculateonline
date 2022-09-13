<?php

declare(strict_types=1);

namespace Tests\Feature\Http;

class CalculatorCreditTest extends TestSeo
{
    public function testCalculatorCreditPageReturnOk(): void
    {
        $response = $this->get('/calculator-credit');

        $response->assertStatus(200);

        $response = $this->get('/kreditnyj-kalkulyator-s-dosrochnym-pogasheniem');

        $response->assertStatus(200);
    }

    public function testCalculatorCreditContent(): void
    {
        $response = $this->get('/calculator-credit');

        $this->crawler->addContent($response->getContent());

        $this->assertEquals('Кредитный калькулятор | Рассчитать кредит онлайн', $this->getTitle());

        $this->assertEquals(
            'Кредитный калькулятор онлайн рассчитает ежемесячные платежи, сумму переплаты и сформирует график платежей по кредиту.',
            $this->getDescription()
        );

        $this->assertEquals(env('APP_URL') . '/calculator-credit', $this->getCanonicalUrl());
    }

    public function testCalculatorCreditWithEarlyRepaymentContent()
    {
        $response = $this->get('/kreditnyj-kalkulyator-s-dosrochnym-pogasheniem');

        $this->crawler->addContent($response->getContent());

        $this->assertEquals('Кредитный калькулятор с досрочным погашением | Рассчитать кредит онлайн', $this->getTitle());

        $this->assertEquals(
            'Онлайн кредитный калькулятор с досрочным погашением. Укажите дополнительныме параметры для наиболее детального расчета.',
            $this->getDescription()
        );

        $this->assertEquals(env('APP_URL') . '/kreditnyj-kalkulyator-s-dosrochnym-pogasheniem', $this->getCanonicalUrl());
    }
}
