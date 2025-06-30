<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;

class KegiatanSeeder extends Seeder
{
    public function run()
    {
        Kegiatan::factory()->count(4)->create();
    }
}
