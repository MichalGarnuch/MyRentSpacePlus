<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Owner;

class OwnerFactory extends Factory
{
    protected $model = Owner::class;

    public function definition(): array
    {
        return [
            'first_name'      => $this->faker->firstName(),
            'last_name'       => $this->faker->lastName(),
            'phone'           => $this->faker->phoneNumber(),
            'email'           => $this->faker->unique()->safeEmail(),
            'commission_rate' => $this->faker->randomFloat(2, 2, 10),
        ];
    }
}
