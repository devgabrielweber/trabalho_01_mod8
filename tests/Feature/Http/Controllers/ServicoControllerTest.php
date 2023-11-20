<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Servico;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ServicoController
 */
class ServicoControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view(): void
    {
        $servicos = Servico::factory()->count(3)->create();

        $response = $this->get(route('servico.index'));

        $response->assertOk();
        $response->assertViewIs('servico.index');
        $response->assertViewHas('servicos');
    }


    /**
     * @test
     */
    public function create_displays_view(): void
    {
        $response = $this->get(route('servico.create'));

        $response->assertOk();
        $response->assertViewIs('servico.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServicoController::class,
            'store',
            \App\Http\Requests\ServicoStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects(): void
    {
        $nome = $this->faker->word;
        $preco = $this->faker->randomFloat(/** float_attributes **/);
        $responsavel = $this->faker->word;

        $response = $this->post(route('servico.store'), [
            'nome' => $nome,
            'preco' => $preco,
            'responsavel' => $responsavel,
        ]);

        $servicos = Servico::query()
            ->where('nome', $nome)
            ->where('preco', $preco)
            ->where('responsavel', $responsavel)
            ->get();
        $this->assertCount(1, $servicos);
        $servico = $servicos->first();

        $response->assertRedirect(route('servico.index'));
        $response->assertSessionHas('servico.id', $servico->id);
    }


    /**
     * @test
     */
    public function show_displays_view(): void
    {
        $servico = Servico::factory()->create();

        $response = $this->get(route('servico.show', $servico));

        $response->assertOk();
        $response->assertViewIs('servico.show');
        $response->assertViewHas('servico');
    }


    /**
     * @test
     */
    public function edit_displays_view(): void
    {
        $servico = Servico::factory()->create();

        $response = $this->get(route('servico.edit', $servico));

        $response->assertOk();
        $response->assertViewIs('servico.edit');
        $response->assertViewHas('servico');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ServicoController::class,
            'update',
            \App\Http\Requests\ServicoUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects(): void
    {
        $servico = Servico::factory()->create();
        $nome = $this->faker->word;
        $preco = $this->faker->randomFloat(/** float_attributes **/);
        $responsavel = $this->faker->word;

        $response = $this->put(route('servico.update', $servico), [
            'nome' => $nome,
            'preco' => $preco,
            'responsavel' => $responsavel,
        ]);

        $servico->refresh();

        $response->assertRedirect(route('servico.index'));
        $response->assertSessionHas('servico.id', $servico->id);

        $this->assertEquals($nome, $servico->nome);
        $this->assertEquals($preco, $servico->preco);
        $this->assertEquals($responsavel, $servico->responsavel);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects(): void
    {
        $servico = Servico::factory()->create();

        $response = $this->delete(route('servico.destroy', $servico));

        $response->assertRedirect(route('servico.index'));

        $this->assertModelMissing($servico);
    }


    /**
     * @test
     */
    public function search_redirects(): void
    {
        $response = $this->get(route('servico.search'));

        $response->assertRedirect(route('servico.list'));
    }
}
