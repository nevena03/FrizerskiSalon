<?php

namespace Database\Seeders;

use App\Models\Racun;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RacunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('racuns')->insert([
        [
            'ukupna_cena' => 550.00,
            'nacin_placanja' => 'Kartica',
            'datum_izdavanja' => Carbon::createFromFormat('d.m.Y.','12.03.2025.')->toDateString(),
            'termin_id' => 1

        ]
        ]);
    }
}
