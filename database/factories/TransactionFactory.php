<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-1 month', '+1 week');
        $endDate = fake()->dateTimeBetween($startDate, '+1 month');

        return [
            'building_id' => Building::factory(),
            'renter_id' => User::factory(),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'total_amount' => fake()->randomFloat(2, 500, 5000),
        ];
    }
}