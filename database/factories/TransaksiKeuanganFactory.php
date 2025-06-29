<?php

namespace Database\Factories;

use App\Models\KategoriTransaksi;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransaksiKeuangan>
 */
class TransaksiKeuanganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'saldo'=> $this->faker->numberBetween(100000, 1000000),
        'keterangan'=> $this->faker->paragraph(4),
        'tanggal'=> $this->faker->dateTimeBetween('-1 year', 'now'),
        'kategori_transaksi_id'=> KategoriTransaksi::factory(),
        'user_id'=> User::factory(),
        'kegiatan_id'=> Kegiatan::factory(),
        ];
    }
}
