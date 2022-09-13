<?php

namespace App\Enum\Calculator\Finance;

enum VatType: string
{
    case ADD_VAT = 'add_vat';
    case ALLOCATE_VAT = 'allocate_vat';

    public function label(): string
    {
        return match ($this) {
            self::ADD_VAT => 'Начислить НДС',
            self::ALLOCATE_VAT => 'Выделить НДС'
        };
    }
}
