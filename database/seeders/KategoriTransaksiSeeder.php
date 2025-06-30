<?php

namespace Database\Seeders;

use App\Models\KategoriTransaksi;
use Illuminate\Database\Seeder;

class KategoriTransaksiSeeder extends Seeder
{
    public function run()
    {
        KategoriTransaksi::factory()->count(4)->create();
    }
}
