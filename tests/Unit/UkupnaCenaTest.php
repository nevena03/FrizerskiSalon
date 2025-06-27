<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Termin;
use App\Models\Usluga;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UkupnaCenaTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    use RefreshDatabase;

    public function test_ukupna_cena()
    {
        $termin = Termin::factory()->create();
        $usluga1 = Usluga::factory()->create(['cena'=>500]);
        $usluga2 = Usluga::factory()->create(['cena'=>800]);

        $termin->uslugas()->attach([$usluga1->id, $usluga2->id]);

        $ukupna_cena = $termin->uslugas()->sum('cena');

        $this->assertEquals(1300, $ukupna_cena);
    }
}
