<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PaymentSchedule;
use App\Models\RentalAgreement; // ✅ Poprawnie

class PaymentScheduleFactory extends Factory
{
    protected $model = PaymentSchedule::class;

    public function definition(): array
    {
        return [
            'rental_agreement_id' => RentalAgreement::factory(),
            'due_date'            => $this->faker->dateTimeBetween('-1 month', '+6 months')->format('Y-m-d'),
            'amount'              => $this->faker->randomFloat(2, 400, 3500),
            'type'                => $this->faker->randomElement(['rent','owner_rent','media','commission']),
            'status'              => $this->faker->randomElement(['pending','paid','overdue']),
        ];
    }
}
