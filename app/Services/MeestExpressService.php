<?php

namespace App\Services;

use App\Services\DeliveryServiceInterface;

class MeestExpressService implements DeliveryServiceInterface
{
    public function sendPackage(array $sender, array $recipient, array $packageData): bool
    {
        return true;
    }
}