<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;
use App\Models\User;
use App\Models\Termin;

class FrizerPotvrdjujeTerminTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;
    /** @test */
    public function frizer_uspesno_potvrdjuje_termin()
    {
        $frizer = User::factory()->create(['uloga' => 'frizer']);
        $termin = Termin::factory()->create([
            'status' => 'nepotvrdjen',
            'frizer_id' => $frizer->id,
            'datum' => now()->addDays(1)->format('Y-m-d'),
            'vreme' => now()->addHours(4)->format('H:i:s'),
        ]);

        $this->actingAs($frizer)
            ->put(route('termins.potvrdi', $termin))
            ->assertRedirect(route('termins.index', ['status' => 'potvrdjen']))
            ->assertSessionHas('success');

        $this->assertDatabaseHas('termins', [
            'id' => $termin->id,
            'status' => 'potvrdjen',
        ]);
    }
}