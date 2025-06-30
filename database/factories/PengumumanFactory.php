<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengumuman>
 */
class PengumumanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'judul'=> $this->faker->sentence(3),
        'isi'=> $this->faker->paragraph(4),
        'kategori_pengumuman_id'=> rand(1, 4),
        'referensi'=> $this->faker->paragraph(1),
        'tanggal'=> $this->faker->dateTimeBetween('-1 year', 'now'),
        'user_id'=> rand(123, 124),
        ];
    }
}
