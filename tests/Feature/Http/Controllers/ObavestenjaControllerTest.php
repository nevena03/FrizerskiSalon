<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Obavestenja;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ObavestenjaController
 */
final class ObavestenjaControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_displays_view(): void
    {
        $obavestenjas = Obavestenja::factory()->count(3)->create();

        $response = $this->get(route('obavestenjas.index'));

        $response->assertOk();
        $response->assertViewIs('obavestenja.index');
        $response->assertViewHas('obavestenjas');
    }


    #[Test]
    public function show_displays_view(): void
    {
        $obavestenja = Obavestenja::factory()->create();

        $response = $this->get(route('obavestenjas.show', $obavestenja));

        $response->assertOk();
        $response->assertViewIs('obavestenja.show');
        $response->assertViewHas('obavestenja');
    }
}
