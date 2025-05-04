<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_schedule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_agreement_id')
                ->constrained('rental_agreements');
            $table->date('due_date');
            $table->decimal('amount', 10, 2);
            $table->enum('type', ['rent', 'owner_rent', 'media', 'commission']);
            $table->enum('status', ['pending', 'paid', 'overdue']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_schedule');
    }
};
