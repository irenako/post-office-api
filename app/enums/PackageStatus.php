<?php

namespace App\Enums;


enum PackageStatus :int
{
    case CREATED = 0;
    case DELIVERING = 1;
    case PENDING_FOR_RECIPIENT = 2;
    case DELIVERED = 3;
    case RETURNED = 4;
    case LOST = 5;

    public static function toArray(): array
    {
        return array_column(PackageStatus::cases(), 'value');
    } 
}
