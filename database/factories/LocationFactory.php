<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;

class LocationFactory extends Factory
{
    protected $model = Location::class;

    public function definition(): array
    {
        return [
            'city'        => $this->faker->city(),
            'postal_code' => $this->faker->postcode(),
        ];
    }
}
