<?php

namespace Database\Factories;

use App\Models\Building;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'description' => fake()->text(),
            'details' => [
                'Construction Type' => fake()->randomElement(['Condo', 'Apartment', 'Townhouse']),
                'Year Built' => fake()->year(),
                'Units in Building' => fake()->numberBetween(10, 200),
                'Bathrooms' => fake()->numberBetween(1, 5),
                'Bedrooms' => fake()->numberBetween(1, 5),
                'Flooring' => fake()->numberBetween(500, 2000) . ' Sq Ft',
                'Amenities' => fake()->randomElement(['Elevator', 'Gym', 'Pool', 'Parking']),
                'Cooling' => fake()->randomElement(['Central Cooling', 'Window Unit', 'None']),
                'Other Features' => fake()->randomElement(['Fireplace', 'Balcony', 'None']),
            ],
            'pictures' => [
                fake()->imageUrl(),
                fake()->imageUrl(),
                fake()->imageUrl(),
            ],
            'rent_price' => fake()->randomFloat(2, 500, 5000),
            'owner_id' => User::factory(),
        ];
    }
}