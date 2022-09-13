<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

class FinanceCalculatorController extends CalculatorController
{
    public function nds(): View
    {
        $this->seo()->setTitle('НДС калькулятор онлайн | Расчет ндс 20%');
        $this->seo()->setDescription('Онлайн калькулятор НДС выделит или начислит НДС, покажет полученную сумму прописью.');
        return view('calculators.finance.nds');
    }

    public function credit(): View
    {
        $this->seo()->setTitle('Кредитный калькулятор | Рассчитать кредит онлайн');
        $this->seo()->setDescription('Кредитный калькулятор онлайн рассчитает ежемесячные платежи, сумму переплаты и сформирует график платежей по кредиту.');
        return view('calculators.finance.credit');
    }

    public function creditWithEarlyRepayment(): View
    {
        $this->seo()->setTitle('Кредитный калькулятор с досрочным погашением | Рассчитать кредит онлайн');
        $this->seo()->setDescription('Онлайн кредитный калькулятор с досрочным погашением. Укажите дополнительныме параметры для наиболее детального расчета.');
        return view('calculators.finance.credit_early_repayment');
    }
}
