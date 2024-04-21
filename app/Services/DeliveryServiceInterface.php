<?php 

namespace App\Services;

interface DeliveryServiceInterface
{
    public function sendPackage(array $sender, array $recipient, array $packageData): bool;
}