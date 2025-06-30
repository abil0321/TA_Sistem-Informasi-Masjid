<?php

namespace Database\Seeders;

use App\Models\TransaksiKeuangan;
use Illuminate\Database\Seeder;

class TransaksiKeuanganSeeder extends Seeder
{
    public function run()
    {
        TransaksiKeuangan::factory()->count(4)->create();
    }
}
