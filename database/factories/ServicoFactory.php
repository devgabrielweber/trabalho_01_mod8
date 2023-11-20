<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Servico;

class ServicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Servico::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'preco' => $this->faker->randomFloat(0, 0, 9999999999.),
            'responsavel' => $this->faker->regexify('[A-Za-z0-9]{150}'),
        ];
    }
}
