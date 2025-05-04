<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rental_agreements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained('apartments');
            $table->foreignId('tenant_id')->constrained('tenants');
            $table->foreignId('owner_id')->constrained('owners');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('rent_amount', 10, 2);
            $table->decimal('owner_rent', 10, 2);
            $table->decimal('media_advance', 10, 2)->nullable();
            $table->decimal('company_commission', 10, 2)->nullable();
            $table->enum('status', ['active', 'terminated', 'expired']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rental_agreements');
    }
};
