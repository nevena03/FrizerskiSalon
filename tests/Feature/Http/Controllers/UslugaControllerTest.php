<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Usluga;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\UslugaController
 */
final class UslugaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $uslugas = Usluga::factory()->count(3)->create();

        $response = $this->get(route('uslugas.index'));

        $response->assertOk();
        $response->assertViewIs('usluga.index');
        $response->assertViewHas('uslugas');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('uslugas.create'));

        $response->assertOk();
        $response->assertViewIs('usluga.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UslugaController::class,
            'store',
            \App\Http\Requests\UslugaStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('uslugas.store'));

        $response->assertRedirect(route('uslugas.index'));
        $response->assertSessionHas('usluga.id', $usluga->id);

        $this->assertDatabaseHas(uslugas, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $usluga = Usluga::factory()->create();

        $response = $this->get(route('uslugas.show', $usluga));

        $response->assertOk();
        $response->assertViewIs('usluga.show');
        $response->assertViewHas('usluga');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $usluga = Usluga::factory()->create();

        $response = $this->get(route('uslugas.edit', $usluga));

        $response->assertOk();
        $response->assertViewIs('usluga.edit');
        $response->assertViewHas('usluga');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\UslugaController::class,
            'update',
            \App\Http\Requests\UslugaUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $usluga = Usluga::factory()->create();

        $response = $this->put(route('uslugas.update', $usluga));

        $usluga->refresh();

        $response->assertRedirect(route('uslugas.index'));
        $response->assertSessionHas('usluga.id', $usluga->id);
    }


    #[Test]
    public function destroy_deletes_and_redirects(): void
    {
        $usluga = Usluga::factory()->create();

        $response = $this->delete(route('uslugas.destroy', $usluga));

        $response->assertRedirect(route('uslugas.index'));

        $this->assertModelMissing($usluga);
    }
}
