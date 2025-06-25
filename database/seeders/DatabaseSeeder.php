<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Adding an admin user
        $user = \App\Models\User::factory()
            ->count(1)
            ->create([
                'ime'=> 'Nevena',
                'prezime'=> 'Pesic',
                'username' => 'nevenapesic',
                'password' => \Hash::make('admin'),
                'broj_telefona'=> '0645145578',
                'uloga'=> 'admin'
            ]);

        $this->call(UserSeeder::class);
        $this->call(TerminSeeder::class);
        $this->call(ObavestenjaSeeder::class);
        $this->call(UslugaSeeder::class);
        $this->call(RacunSeeder::class);
        $this->call(StavkaRacunaSeeder::class);
        $this->call(TerminUslugaSeeder::class);

    }
}
