<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Apartment;

class ApartmentFactory extends Factory
{
    protected $model = Apartment::class;

    public function definition(): array
    {
        return [
            'building_id'      => Building::factory(),
            'apartment_number' => $this->faker->bothify('##?'),
            'floor_number'     => $this->faker->numberBetween(1, 15),
            'size_sqm'         => $this->faker->randomFloat(2, 30, 120),
            'status'           => $this->faker->randomElement(['available','rented','maintenance']),
        ];
    }
}
