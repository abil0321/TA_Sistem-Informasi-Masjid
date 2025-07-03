<?php

namespace Database\Seeders;

use App\Models\Donasi;
use App\Models\KategoriKegiatan;
use App\Models\KategoriPengumuman;
use App\Models\KategoriTransaksi;
use App\Models\Pengumuman;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // KategoriKegiatanSeeder::class,
            // KategoriTransaksiSeeder::class,
            // KategoriPengumumanSeeder::class,
            PermissionSeeder::class,
            // UserSeeder::class,
            // PengumumanSeeder::class
            // AdminSeeder::class,
        ]);

        // KategoriKegiatan::factory()->count(4)->create();
        // KategoriTransaksi::factory()->count(4)->create();
        // KategoriPengumuman::factory()->count(4)->create();
        // User::factory()->count(10)->create();

        // Donasi::factory()->count(30)->create();
        // Kegiatan::factory()->count(30)->create();
        // Pengumuman::factory()->count(30)->create();
        // TransaksiKeuangan::factory()->count(30)->create();

        // User::factory()->create([
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => 'admin123456',
        // ]);

        // $this->call(PermissionSeeder::class);

    }
}
