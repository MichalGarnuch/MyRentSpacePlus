<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_usage', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apartment_id')->constrained('apartments');
            $table->foreignId('rental_agreement_id')
                ->constrained('rental_agreements');
            $table->foreignId('media_type_id')->constrained('media_types');
            $table->date('reading_date');
            $table->decimal('value', 10, 2);
            $table->boolean('archived')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_usage');
    }
};
