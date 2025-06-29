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
    public function test_klijent_otkazuje_termin()
    {
        $klijent = User::factory()->create(['uloga' => 'klijent']);
        $frizer = User::factory()->create(['uloga' => 'frizer']);

        $termin = Termin::factory()->create([
            'klijent_id' => $klijent->id,
            'frizer_id' => $frizer->id,
            'datum' => now()->addDays(1)->format('Y-m-d'),
            'vreme' => now()->addHours(4)->format('H:i:s'),
            'status' => 'potvrdjen',
        ]);

        $response = $this->actingAs($klijent)
            ->put(route('termins.otkazi', $termin));

        $response->assertRedirect();
        $response->assertSessionHas('success');

          $this->assertDatabaseHas('termins', [
            'id' => $termin->id,
            'status' => 'otkazan',
        ]);



    }
}