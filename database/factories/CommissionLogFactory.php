<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\CommissionLog;
use App\Models\RentalAgreement; // ✅ Poprawnie

class CommissionLogFactory extends Factory
{
    protected $model = CommissionLog::class;

    public function definition(): array
    {
        return [
            'rental_agreement_id' => RentalAgreement::factory(),
            'commission_amount'   => $this->faker->randomFloat(2, 50, 500),
            'payment_date'        => $this->faker->date(),
        ];
    }
}
