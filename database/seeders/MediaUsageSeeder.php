<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MediaUsage;

class MediaUsageSeeder extends Seeder
{
    public function run(): void
    {
        MediaUsage::factory(20)->create();
    }
}
