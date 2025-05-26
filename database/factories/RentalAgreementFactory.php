<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\RentalAgreement;

class RentalAgreementFactory extends Factory
{
    protected $model = RentalAgreement::class;

    public function definition(): array
    {
        $start = $this->faker->dateTimeBetween('-1 year', 'now');
        $end   = $this->faker->dateTimeBetween($start, '+1 year');

        return [
            'apartment_id'      => Apartment::factory(),
            'tenant_id'         => Tenant::factory(),
            'owner_id'          => Owner::factory(),
            'start_date'        => $start->format('Y-m-d'),
            'end_date'          => $end->format('Y-m-d'),
            'rent_amount'       => $this->faker->randomFloat(2, 500, 4000),
            'owner_rent'        => $this->faker->randomFloat(2, 400, 3500),
            'media_advance'     => $this->faker->randomFloat(2, 0, 500),
            'company_commission'=> $this->faker->randomFloat(2, 0, 500),
            'status'            => $this->faker->randomElement(['active','terminated','expired']),
        ];
    }
}
