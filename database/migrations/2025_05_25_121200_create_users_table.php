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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // Standardowe kolumny Laravel Auth:
            $table->string('name'); // Nazwa użytkownika (często używana do wyświetlania)
            $table->string('email')->unique(); // KLUCZOWE: Adres email jako unikalny identyfikator
            $table->timestamp('email_verified_at')->nullable(); // Do weryfikacji adresu email
            $table->string('password');
            $table->rememberToken(); // Dla funkcji "Zapamiętaj mnie"

            // Twoje istniejące, niestandardowe kolumny:
            $table->string('username', 100); // Dodatkowa kolumna, jeśli chcesz zachować 'username'
            $table->enum('role', ['admin', 'tenant', 'owner']);
            $table->unsignedBigInteger('related_id')->nullable();

            $table->timestamps();

            // Upewnij się, że tabele 'tenants' i 'owners' istnieją PRZED tą migracją,
            // jeśli chcesz zachować te relacje klucza obcego.
            // Jeśli nie są jeszcze utworzone, to ta migracja się wywali.
            // Możesz je tymczasowo zakomentować, jeśli masz z nimi problem:
            // $table->foreign('related_id')
            //     ->references('id')->on('tenants') // Tutaj musiałbyś zdecydować, czy to 'tenants' czy 'owners'
            //     ->nullOnDelete();
            // Pamiętaj, że related_id może odnosić się albo do tenant, albo do owner, nie do obu naraz w prosty sposób FK.
            // Możliwe, że potrzebujesz oddzielnych kolumn foreign key dla tenant_id i owner_id,
            // lub zaimplementować to w logice aplikacji bez bezpośredniego FK.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
