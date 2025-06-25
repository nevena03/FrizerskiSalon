<?php

namespace Database\Seeders;

use App\Models\Termin;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('termins')->insert([
        [
            'datum' => Carbon::createFromFormat('d.m.Y.','12.03.2025.')->toDateString(),
            'vreme' =>  Carbon::createFromTime(12, 30)->format('H:i:s'),
            'status'=> 'zavrsen',
            'frizer_id' => 4,
            'klijent_id' => 3

        ],
        [
            'datum' => Carbon::tomorrow(),
            'vreme' =>  Carbon::createFromTime(13, 30)->format('H:i:s'),
            'status'=> 'potvrdjen',
            'frizer_id' => 5,
            'klijent_id' => 2

        ],
        [
            'datum' => Carbon::tomorrow(),
            'vreme' =>  Carbon::createFromTime(10, 30)->format('H:i:s'),
            'status'=> 'nepotvrdjen',
            'frizer_id' => 5,
            'klijent_id' => 3
        ],
        [
            'datum' => Carbon::tomorrow(),
            'vreme' =>  Carbon::createFromTime(9, 30)->format('H:i:s'),
            'status'=> 'nepotvrdjen',
            'frizer_id' => 4,
            'klijent_id' => 2

        ]
        ]);
    }
}
