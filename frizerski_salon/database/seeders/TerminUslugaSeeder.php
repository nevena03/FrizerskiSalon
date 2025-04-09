<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TerminUslugaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('termin_usluga')->insert([
            [
                'usluga_id' => 1,
                'termin_id' => 2
            ],
            [
                'usluga_id' => 2,
                'termin_id' => 2
            ],
            [
                'usluga_id' => 4,
                'termin_id' => 3
            ],
            [
                'usluga_id' => 3,
                'termin_id' => 3
            ],
            [
                'usluga_id' => 1,
                'termin_id' => 3
            ],
            [
                'usluga_id' => 2,
                'termin_id' => 4
            ],
            [
                'usluga_id' => 3,
                'termin_id' => 1
            ]
            ]);
    }
}
