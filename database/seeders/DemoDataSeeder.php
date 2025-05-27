<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemoDataSeeder extends Seeder
{
    /**
     * Uruchamia poszczególne seedery.
     */
    public function run(): void
    {
        $this->call([
            LocationSeeder::class,
            BuildingSeeder::class,
            ApartmentSeeder::class,
            TenantSeeder::class,
            OwnerSeeder::class,
            RentalAgreementSeeder::class,
            UserSeeder::class,
            CommissionLogSeeder::class,
            PaymentScheduleSeeder::class,
            RentPaymentSeeder::class,
            MaintenanceRequestSeeder::class,
            MediaTypeSeeder::class,
            MediaUsageSeeder::class,
            ReportSeeder::class,
            ReviewSeeder::class,
            NotificationSeeder::class,
            LogEntrySeeder::class,
        ]);
    }
}
