<?php

namespace Database\Seeders;

use App\Models\Obavestenja;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ObavestenjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('obavestenjas')->insert([
            [
                'poruka' => 'Termin je kreiran.',
                'datum' => Carbon::today(),
                'termin_id'=> 2
            ],
            [
                'poruka' => 'Termin je kreiran.',
                'datum' => Carbon::today(),
                'termin_id'=> 3
            ],
            [
                'poruka' => 'Termin je kreiran.',
                'datum' => Carbon::today(),
                'termin_id'=> 4
            ]
        ]);
    }
}
