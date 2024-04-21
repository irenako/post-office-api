<?php

namespace App\Services;

class NovaPoshtaService implements DeliveryServiceInterface
{
    public function sendPackage(array $sender, array $recipient, array $packageData): bool
    {
        return true;
    }
}