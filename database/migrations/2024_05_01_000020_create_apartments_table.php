<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('building_id')->constrained('buildings');
            $table->string('apartment_number', 50);
            $table->integer('floor_number');
            $table->decimal('size_sqm', 10, 2);
            $table->enum('status', ['available', 'rented', 'maintenance']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('apartments');
    }
};
