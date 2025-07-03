<?php

namespace Database\Factories;

use App\Models\TransaksiKeuangan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Donasi>
 */
class DonasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nama_donatur' => $this->faker->sentence(2),
        'email' => $this->faker->unique()->safeEmail,
        'no_telp'=> $this->faker->phoneNumber(),
        'status' => $this->faker->randomElement(['DONE']),
        'jumlah' => $this->faker->numberBetween($int1 = 100000, $int2 = 1000000000),
        'transaksi_id'=> TransaksiKeuangan::factory(),
        'user_id'=> User::factory(),
        ];
    }
}
