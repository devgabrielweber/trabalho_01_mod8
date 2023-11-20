<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Ramal;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RamalController
 */
class RamalControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $ramals = Ramal::factory()->count(3)->create();

        $response = $this->get(route('ramal.index'));

        $response->assertOk();
        $response->assertViewIs('ramal.list');
        $response->assertViewHas('ramals');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('ramal.create'));

        $response->assertOk();
        $response->assertViewIs('ramal.form');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RamalController::class,
            'store',
            \App\Http\Requests\RamalStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $nome = $this->faker->word;
        $telefone = $this->faker->word;
        $responsavel = $this->faker->word;

        $response = $this->post(route('ramal.store'), [
            'nome' => $nome,
            'telefone' => $telefone,
            'responsavel' => $responsavel,
        ]);

        $ramals = Ramal::query()
            ->where('nome', $nome)
            ->where('telefone', $telefone)
            ->where('responsavel', $responsavel)
            ->get();
        $this->assertCount(1, $ramals);
        $ramal = $ramals->first();

        $response->assertRedirect(route('ramal.list'));
        $response->assertSessionHas('ramal.title', $ramal->title);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $ramal = Ramal::factory()->create();

        $response = $this->delete(route('ramal.destroy', $ramal));

        $response->assertRedirect(route('ramal.list'));

        $this->assertModelMissing($ramal);
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $ramal = Ramal::factory()->create();

        $response = $this->get(route('ramal.edit', $ramal));

        $response->assertOk();
        $response->assertViewIs('ramal.form');
        $response->assertViewHas('ramal');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RamalController::class,
            'update',
            \App\Http\Requests\RamalUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $ramal = Ramal::factory()->create();
        $nome = $this->faker->word;
        $telefone = $this->faker->word;
        $responsavel = $this->faker->word;

        $response = $this->put(route('ramal.update', $ramal), [
            'nome' => $nome,
            'telefone' => $telefone,
            'responsavel' => $responsavel,
        ]);

        $ramal->refresh();

        $response->assertRedirect(route('ramal.list'));
        $response->assertSessionHas('ramal.id', $ramal->id);

        $this->assertEquals($nome, $ramal->nome);
        $this->assertEquals($telefone, $ramal->telefone);
        $this->assertEquals($responsavel, $ramal->responsavel);
    }
}
