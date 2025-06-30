<?php

namespace Database\Seeders;

use App\Models\Donasi;
use Illuminate\Database\Seeder;

class DonasiSeeder extends Seeder
{
    public function run()
    {
        Donasi::factory()->count(4)->create();
    }
}
