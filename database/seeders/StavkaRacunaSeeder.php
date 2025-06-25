<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StavkaRacunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stavka_racuna')->insert([
            [
                'usluga_id' => 3,
                'racun_id' => 1,
                'cena' => 550.00
            ]
        ]);
    }
}
