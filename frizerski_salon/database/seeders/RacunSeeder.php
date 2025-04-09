<?php

namespace Database\Seeders;

use App\Models\Racun;
use Illuminate\Database\Seeder;

class RacunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Racun::factory()
            ->count(5)
            ->create();
    }
}
