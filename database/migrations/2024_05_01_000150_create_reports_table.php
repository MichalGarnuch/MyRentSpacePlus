<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('report_type', ['financial', 'usage', 'summary']);
            $table->timestamp('generated_at')->useCurrent();
            $table->json('data');                 // JSON, MySQL 5.7+ / 8.0
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
