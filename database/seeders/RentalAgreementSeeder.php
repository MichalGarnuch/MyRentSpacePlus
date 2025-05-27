<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RentalAgreement;

class RentalAgreementSeeder extends Seeder
{
    public function run(): void
    {
        RentalAgreement::factory(20)->create();
    }
}
