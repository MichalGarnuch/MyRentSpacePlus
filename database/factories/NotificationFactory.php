<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Notification;

class NotificationFactory extends Factory
{
    protected $model = Notification::class;

    public function definition(): array
    {
        return [
            'user_id'  => User::factory(),
            'message'  => $this->faker->sentence(),
            'type'     => $this->faker->randomElement(['reminder','info','alert']),
            'sent_at'  => now(),
            'status'   => $this->faker->randomElement(['unread','read']),
        ];
    }
}
