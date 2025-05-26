<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MediaType;

class MediaTypeFactory extends Factory
{
    protected $model = MediaType::class;

    public function definition(): array
    {
        $types = [
            ['name'=>'Prąd','unit'=>'kWh'],
            ['name'=>'Woda','unit'=>'m³'],
            ['name'=>'Gaz','unit'=>'m³'],
            ['name'=>'Ciepło','unit'=>'GJ'],
            ['name'=>'Internet','unit'=>'Mbps'],
        ];

        return $this->faker->randomElement($types);
    }
}
