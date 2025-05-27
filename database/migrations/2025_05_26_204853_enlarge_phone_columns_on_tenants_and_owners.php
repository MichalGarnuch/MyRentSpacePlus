<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->string('phone', 30)->change();
        });
        Schema::table('owners', function (Blueprint $table) {
            $table->string('phone', 30)->change();
        });
    }

    public function down(): void
    {
        Schema::table('tenants', fn($t)=>$t->string('phone',15)->change());
        Schema::table('owners', fn($t)=>$t->string('phone',15)->change());
    }

};
