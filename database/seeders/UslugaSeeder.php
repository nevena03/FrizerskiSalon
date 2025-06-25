<?php

namespace Database\Seeders;

use App\Models\Usluga;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UslugaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        DB::table('uslugas')->insert([
            [
                'naziv' => 'Feniranje',
                'cena'=> 650.00,
                'administrator_id'=> 1
            ],
            [
                'naziv' => 'Šišanje',
                'cena'=> 950.00,
                'administrator_id'=> 1

            ],
            [
                'naziv' => 'Pranje kose',
                'cena'=> 550.00,
                'administrator_id'=> 1
            ],
            [
                'naziv' => 'Farbanje kose',
                'cena'=> 1200.00,
                'administrator_id'=> 1
            ]
        ]);
    }
}
