<?php

namespace App\Enums;

enum DeliveryCostStatus :string
{
    case PENDING = 'pending';
    case PAID = 'paid';

    public static function toArray(): array
    {
        return array_column(DeliveryCostStatus::cases(), 'value');
    } 
}
