<?php

namespace App\Services;

class UkrPoshtaService implements DeliveryServiceInterface
{
    public function sendPackage(array $sender, array $recipient, array $packageData): bool
    {
        return true;
    }
}