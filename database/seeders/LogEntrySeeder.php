<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\LogEntry;

class LogEntrySeeder extends Seeder
{
    public function run(): void
    {
        LogEntry::factory(20)->create();
    }
}
