<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CommissionLog;

class CommissionLogSeeder extends Seeder
{
    public function run(): void
    {
        CommissionLog::factory(20)->create();
    }
}
