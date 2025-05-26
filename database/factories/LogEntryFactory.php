<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\LogEntry;

class LogEntryFactory extends Factory
{
    protected $model = LogEntry::class;

    public function definition(): array
    {
        return [
            'user_id'   => User::factory(),
            'action'    => $this->faker->sentence(),
            'timestamp' => now(),
        ];
    }
}
