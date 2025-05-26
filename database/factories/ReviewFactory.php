<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;

class ReviewFactory extends Factory
{
    protected $model = Review::class;

    public function definition(): array
    {
        return [
            'rental_agreement_id' => RentalAgreement::factory(),
            'user_id'             => User::factory(),
            'rating'              => $this->faker->numberBetween(1,5),
            'comment'             => $this->faker->optional()->sentence(),
            'created_at'          => now(),
        ];
    }
}
