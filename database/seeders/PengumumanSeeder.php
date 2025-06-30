<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    public function run()
    {
        Pengumuman::factory()->count(4)->create();
    }
}
