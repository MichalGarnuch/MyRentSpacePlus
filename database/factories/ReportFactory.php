<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Report;

class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition(): array
    {
        return [
            'user_id'      => User::factory(),
            'report_type'  => $this->faker->randomElement(['financial','usage','summary']),
            'generated_at' => now(),
            'data'         => json_encode([
                'income'   => $this->faker->numberBetween(1000,10000),
                'expenses' => $this->faker->numberBetween(500,5000),
                'profit'   => $this->faker->numberBetween(500,5000),
            ]),
        ];
    }
}
