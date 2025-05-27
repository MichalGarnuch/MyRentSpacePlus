<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PaymentSchedule;

class PaymentScheduleSeeder extends Seeder
{
    public function run(): void
    {
        PaymentSchedule::factory(20)->create();
    }
}
