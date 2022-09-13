<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\Feature\Http\TestSeo;

class CalculatorVatTest extends TestSeo
{
    public function testCalculatorNdsPageReturnOk(): void
    {
        $response = $this->get('/calculator-nds');

        $response->assertStatus(200);
    }

    public function testCalculatorNdsContent(): void
    {
        $response = $this->get('/calculator-nds');

        $this->crawler->addContent($response->getContent());

        $this->assertEquals('НДС калькулятор онлайн | Расчет ндс 20%', $this->getTitle());

        $this->assertEquals(
            'Онлайн калькулятор НДС выделит или начислит НДС, покажет полученную сумму прописью.',
            $this->getDescription()
        );

        $this->assertEquals(env('APP_URL') . '/calculator-nds', $this->getCanonicalUrl());
    }


}
