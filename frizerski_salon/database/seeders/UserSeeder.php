<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'ime' => 'Filip',
                'prezime'=> 'Milutinovic',
                'username'=> 'filipmil',
                'password' => \Hash::make('filip'),
                'broj_telefona' => '0653158599',
                'uloga' => 'klijent'
            ],
            [
                'ime' => 'Andrea',
                'prezime'=> 'Isailovic',
                'username'=> 'aisailovic',
                'password' => \Hash::make('ada'),
                'broj_telefona' => '0613712880',
                'uloga' => 'klijent'

            ],
            [
                'ime' => 'Jovana',
                'prezime'=> 'Lazic',
                'username'=> 'jovanal',
                'password' => \Hash::make('jovana'),
                'broj_telefona' => '0637810165',
                'uloga' => 'frizer'
            ],
            [
                'ime' => 'Jelena',
                'prezime'=> 'Petkovic',
                'username'=> 'jelenap',
                'password' => \Hash::make('jelena'),
                'broj_telefona' => '062548822',
                'uloga' => 'frizer'
            ]
            ]);
    }
}
