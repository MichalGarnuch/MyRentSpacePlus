<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Building;
use App\Models\Location;


class BuildingFactory extends Factory
{
    protected $model = Building::class;

    public function definition(): array
    {
        return [
            'location_id'     => Location::factory(),
            'street'          => $this->faker->streetName(),
            'building_number' => $this->faker->buildingNumber(),
            'total_floors'    => $this->faker->numberBetween(1, 20),
            'common_cost'     => $this->faker->randomFloat(2, 500, 2000),
        ];
    }
}
