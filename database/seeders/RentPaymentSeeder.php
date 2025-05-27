<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RentPayment;

class RentPaymentSeeder extends Seeder
{
    public function run(): void
    {
        RentPayment::factory(20)->create();
    }
}
