<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Termin;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TerminController
 */
final class TerminControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $termins = Termin::factory()->count(3)->create();

        $response = $this->get(route('termins.index'));

        $response->assertOk();
        $response->assertViewIs('termin.index');
        $response->assertViewHas('termins');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('termins.create'));

        $response->assertOk();
        $response->assertViewIs('termin.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TerminController::class,
            'store',
            \App\Http\Requests\TerminStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $response = $this->post(route('termins.store'));

        $response->assertRedirect(route('termins.index'));
        $response->assertSessionHas('termin.id', $termin->id);

        $this->assertDatabaseHas(termins, [ /* ... */ ]);
    }


    #[Test]
    public function show_displays_view(): void
    {
        $termin = Termin::factory()->create();

        $response = $this->get(route('termins.show', $termin));

        $response->assertOk();
        $response->assertViewIs('termin.show');
        $response->assertViewHas('termin');
    }


    #[Test]
    public function edit_displays_view(): void
    {
        $termin = Termin::factory()->create();

        $response = $this->get(route('termins.edit', $termin));

        $response->assertOk();
        $response->assertViewIs('termin.edit');
        $response->assertViewHas('termin');
    }


    #[Test]
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TerminController::class,
            'update',
            \App\Http\Requests\TerminUpdateRequest::class
        );
    }

    #[Test]
    public function update_redirects(): void
    {
        $termin = Termin::factory()->create();

        $response = $this->put(route('termins.update', $termin));

        $termin->refresh();

        $response->assertRedirect(route('termins.index'));
        $response->assertSessionHas('termin.id', $termin->id);
    }
}
