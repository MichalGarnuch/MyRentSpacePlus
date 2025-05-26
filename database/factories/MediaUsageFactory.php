<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MediaUsage;

class MediaUsageFactory extends Factory
{
    protected $model = MediaUsage::class;

    public function definition(): array
    {
        return [
            'apartment_id'        => Apartment::factory(),
            'rental_agreement_id' => RentalAgreement::factory(),
            'media_type_id'       => MediaType::factory(),
            'reading_date'        => $this->faker->date(),
            'value'               => $this->faker->randomFloat(2, 0, 500),
            'archived'            => $this->faker->boolean(10),
        ];
    }
}
