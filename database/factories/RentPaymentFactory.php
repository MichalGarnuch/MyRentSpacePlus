<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RentPayment;
use App\Models\RentalAgreement;


class RentPaymentFactory extends Factory
{
    protected $model = RentPayment::class;

    public function definition(): array
    {
        return [
            'rental_agreement_id' => RentalAgreement::factory(),
            'payment_date'        => $this->faker->date(),
            'amount'              => $this->faker->randomFloat(2, 400, 3500),
            'type'                => $this->faker->randomElement(['rent','owner_rent','media','commission']),
            'status'              => $this->faker->randomElement(['paid','pending','overdue']),
        ];
    }
}
