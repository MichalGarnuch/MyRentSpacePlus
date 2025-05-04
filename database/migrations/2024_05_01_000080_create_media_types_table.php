<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media_types', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('unit', 50);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media_types');
    }
};
