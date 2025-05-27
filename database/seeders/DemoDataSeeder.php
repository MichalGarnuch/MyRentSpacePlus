<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Uruchamia demo-dane przez fabryki.
     */
    public function run(): void
    {
        \App\Models\Location::factory(20)->create();
        \App\Models\Building::factory(20)->create();
        \App\Models\Apartment::factory(20)->create();
        \App\Models\Tenant::factory(20)->create();
        \App\Models\Owner::factory(20)->create();
        \App\Models\RentalAgreement::factory(20)->create();
        \App\Models\CommissionLog::factory(20)->create();
        \App\Models\PaymentSchedule::factory(20)->create();
        \App\Models\RentPayment::factory(20)->create();
        \App\Models\MaintenanceRequest::factory(20)->create();
        \App\Models\MediaType::factory(5)->create();
        \App\Models\MediaUsage::factory(20)->create();
        \App\Models\User::factory(20)->create();
        \App\Models\Report::factory(20)->create();
        \App\Models\Review::factory(20)->create();
        \App\Models\Notification::factory(20)->create();
        \App\Models\LogEntry::factory(20)->create();
    }
}
