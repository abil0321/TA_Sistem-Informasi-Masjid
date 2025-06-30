<?php

namespace Database\Seeders;

use App\Models\KategoriPengumuman;
use Illuminate\Database\Seeder;

class KategoriPengumumanSeeder extends Seeder
{
    public function run()
    {
        KategoriPengumuman::factory()->count(4)->create();
    }
}
