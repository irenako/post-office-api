<?php

namespace Database\Factories;

use App\Enums\DeliveryCostStatus;
use App\Enums\PackageStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'senderId' => User::factory()->create()->id,
            'recipientId' => User::factory()->create()->id,
            'addressFrom' => $this->faker->address,
            'addressTo' => $this->faker->address,
            'status' => $this->faker->randomElement(PackageStatus::toArray()),
            'deliveryCost' => $this->faker->randomFloat(2, 10, 100),
            'paymentStatus' => DeliveryCostStatus::PENDING->value,
            'created_at' => $this->faker->dateTime(),
            'updated_at' => $this->faker->dateTime(),
        ];
    }
}
