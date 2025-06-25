<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Racun;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RacunController
 */
final class RacunControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $racuns = Racun::factory()->count(3)->create();

        $response = $this->get(route('racuns.index'));

        $response->assertOk();
        $response->assertViewIs('racun.index');
        $response->assertViewHas('racuns');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('racuns.create'));

        $response->assertOk();
        $response->assertViewIs('racun.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RacunController::class,
            'store',
            \App\Http\Requests\RacunStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('racuns.store'));

        $response->assertRedirect(route('racuns.index'));
        $response->assertSessionHas('racun.id', $racun->id);

        $this->assertDatabaseHas(racuns, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $racun = Racun::factory()->create();

        $response = $this->get(route('racuns.show', $racun));

        $response->assertOk();
        $response->assertViewIs('racun.show');
        $response->assertViewHas('racun');
    }
}
