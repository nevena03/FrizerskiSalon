<?php

namespace Database\Seeders;

use App\Models\Obavestenja;
use Illuminate\Database\Seeder;

class ObavestenjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obavestenja::factory()
            ->count(5)
            ->create();
    }
}
