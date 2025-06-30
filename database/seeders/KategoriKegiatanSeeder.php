<?php

namespace Database\Seeders;

use App\Models\KategoriKegiatan;
use Illuminate\Database\Seeder;

class KategoriKegiatanSeeder extends Seeder
{
    public function run()
    {
        KategoriKegiatan::factory()->count(4)->create();
    }
}
