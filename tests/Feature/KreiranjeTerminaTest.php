<?php

namespace Tests\Feature;

use App\Models\Termin;
use App\Models\User;
use App\Models\Usluga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class KreiranjeTerminaTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    /** @test */
    public function test_klijent_zakazuje_termin()
    {
        $klijent = User::factory()->create(['uloga' => 'klijent']);
        $frizer = User::factory()->create(['uloga' => 'frizer']);
        $usluga = Usluga::factory()->create();

        $this->actingAs($klijent)
            ->post(route('termins.store'), [
                'datum' => now()->addDays(2)->format('Y-m-d'),
                'vreme' => '10:00:00',
                'frizer_id' => $frizer->id,
                'usluge' => [$usluga->id],
            ])
            ->assertRedirect();

        $this->assertDatabaseHas('termins', [
            'klijent_id' => $klijent->id,
            'frizer_id' => $frizer->id,
            'vreme' => '10:00:00',
        ]);
    }
    /** @test */
    public function test_ne_moze_se_zakazati_termin_ako_je_vreme_zauzeto()
    {
        $klijent = User::factory()->create(['uloga' => 'klijent']);
        $frizer = User::factory()->create(['uloga' => 'frizer']);
        $usluga = Usluga::factory()->create();

        Termin::factory()->create([
            'datum' => now()->addDays(1)->format('Y-m-d'),
            'vreme' => '10:00:00',
            'frizer_id' => $frizer->id,
            'status' => 'potvrdjen',
        ]);

        $response = $this->actingAs($klijent)
        ->from(route('termins.create'))
        ->post(route('termins.store'), [
        'datum' => now()->addDays(1)->format('Y-m-d'),
        'vreme' => '10:00:00',
        'frizer_id' => $frizer->id,
        'usluge' => [$usluga->id],
    ]);

    $response->assertRedirect(route('termins.create'));
    $response->assertSessionHasErrors('vreme');
    }
}
