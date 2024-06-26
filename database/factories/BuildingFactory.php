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
            'description' => $this->faker->text(),
            // for building
            // 'details' => [
            //     'Construction Type' => $this->faker->randomElement(['Condo', 'Apartment', 'Townhouse']),
            //     'Year Built' => $this->faker->year(),
            //     'Units in Building' => $this->faker->numberBetween(10, 200),
            //     'Bathrooms' => $this->faker->numberBetween(1, 5),
            //     'Bedrooms' => $this->faker->numberBetween(1, 5),
            //     'Flooring' => $this->faker->numberBetween(500, 2000) . ' Sq Ft',
            //     'Amenities' => $this->faker->randomElement(['Elevator', 'Gym', 'Pool', 'Parking']),
            //     'Cooling' => $this->faker->randomElement(['Central Cooling', 'Window Unit', 'None']),
            //     'Other Features' => $this->faker->randomElement(['Fireplace', 'Balcony', 'None']),
            // ],

            // for event
            'details' => [
                'event_name' => $this->faker->sentence(3),
                'event_description' => $this->faker->paragraph(),
                'event_time_d' => $this->faker->dayOfWeek(),
                'event_time_h' => $this->faker->time('h:i A') . ' - ' . $this->faker->time('h:i A'),
                'contact_person' => [
                    'name' => $this->faker->name(),
                    'number' => $this->faker->phoneNumber(),
                    'email' => $this->faker->safeEmail(),
                ],
            ],
            
            'pictures' => [
                $this->faker->imageUrl(640, 480, 'buildings', true),
                $this->faker->imageUrl(640, 480, 'buildings', true),
                $this->faker->imageUrl(640, 480, 'buildings', true),
            ],
            'rent_price' => $this->faker->randomFloat(2, 500, 5000),
            'owner_id' => User::factory(),
            'view_count' => $this->faker->numberBetween(1, 5000),
            'categories_id' => 1,
            'address' => $this->faker->address()
        ];
    }
}
