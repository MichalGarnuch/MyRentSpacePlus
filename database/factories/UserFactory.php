<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        // Najpierw złapemy trochę istniejących tenantów / właścicieli
        $tenantIds = \App\Models\Tenant::pluck('id')->toArray();
        $ownerIds  = \App\Models\Owner::pluck('id')->toArray();

        return [
            'username'   => $this->faker->unique()->userName(),
            'password'   => Hash::make('password'),
            'role'       => $this->faker->randomElement(['admin','tenant','owner']),
            // jeśli to tenant lub owner, przypisz related_id, w przeciwnym razie null
            'related_id' => function (array $attrs) use ($tenantIds, $ownerIds) {
                return match ($attrs['role']) {
                    'tenant' => $this->faker->randomElement($tenantIds),
                    'owner'  => $this->faker->randomElement($ownerIds),
                    default  => null,
                };
            },
        ];
    }
}
