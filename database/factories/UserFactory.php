<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Dodane: Potrzebne do Str::random()

class UserFactory extends Factory
{
    protected $model = User::class;

    protected static ?string $password; // Dodane: Zgodnie z nowszymi wersjami Laravel

    public function definition(): array
    {
        // Złap istniejące ID, ale pamiętaj, że seedery mogą uruchamiać się PRZED
        // utworzeniem wszystkich tenantów/właścicieli, więc to może być puste.
        // Lepszym podejściem jest tworzenie tenantów/właścicieli w osobnym seederze,
        // a następnie przypisywanie ich tutaj, lub tworzenie ich na bieżąco w seederze.
        $tenantIds = \App\Models\Tenant::pluck('id')->toArray();
        $ownerIds  = \App\Models\Owner::pluck('id')->toArray();

        return [
            'name'       => $this->faker->name(), // DODAJE GENEROWANIE DLA 'name'
            'email'      => $this->faker->unique()->safeEmail(), // DODAJE GENEROWANIE DLA 'email'
            'email_verified_at' => now(), // DODAJE GENEROWANIE DLA 'email_verified_at'
            'password'   => static::$password ??= Hash::make('password'), // Hasło: 'password'
            'remember_token' => Str::random(10), // DODAJE GENEROWANIE DLA 'remember_token'

            // Twoje niestandardowe kolumny:
            'username'   => $this->faker->unique()->userName(),
            'role'       => $this->faker->randomElement(['admin','tenant','owner']),
            'related_id' => function (array $attrs) use ($tenantIds, $ownerIds) {
                // Ta logika jest ok, ale pamiętaj, że related_id może być puste
                // jeśli $tenantIds / $ownerIds są puste (bo jeszcze nie ma tenantów/ownerów)
                if ($attrs['role'] === 'tenant' && !empty($tenantIds)) {
                    return $this->faker->randomElement($tenantIds);
                } elseif ($attrs['role'] === 'owner' && !empty($ownerIds)) {
                    return $this->faker->randomElement($ownerIds);
                }
                return null;
            },
        ];
    }
}
