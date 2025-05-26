<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MaintenanceRequest;

class MaintenanceRequestFactory extends Factory
{
    protected $model = MaintenanceRequest::class;

    public function definition(): array
    {
        return [
            'apartment_id' => Apartment::factory(),
            'description'  => $this->faker->sentence(),
            'request_date' => $this->faker->date(),
            'status'       => $this->faker->randomElement(['open','in_progress','closed']),
        ];
    }
}
