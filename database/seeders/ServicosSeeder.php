<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servico;

class ServicosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicos = [
            [
                'nome' => "Lavanderia",
                'preco' => "30",
                'responsavel' => "Hiury",
            ],
            [
                'nome' => "Serviço de quarto",
                'preco' => "40",
                'responsavel' => "Weber",
            ],
        ];

        foreach($servicos as $servico) {
            Servico::create($servico);
        }

    }
}
