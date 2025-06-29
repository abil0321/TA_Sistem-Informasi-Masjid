<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kegiatan>
 */
class KegiatanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'nama_kegiatan'=> $this->faker->sentence(2),
        'deskripsi'=> $this->faker->paragraph(4), // Isi post acak,
        'lokasi'=> $this->faker->sentence(2),
        'jumlah' => $this->faker->numberBetween($int1 = 100000, $int2 = 1000000000),
        'kategori_kegiatan_id'=> rand(1, 4),
        'user_id'=> User::factory(),
        ];
    }
}
