<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MediaType;

class MediaTypeSeeder extends Seeder
{
    public function run(): void
    {
        // media types mamy tylko 5 domyślnie
        MediaType::factory(5)->create();
    }
}
