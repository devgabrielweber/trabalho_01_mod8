<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hospede;

class HospedesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hospedes = [
            [
                'nome' => "Hiury Gabriel Tressoldi",
                'cpf' => "023.023.023-23",
                'email' => "hiury.gt@aluno.ifsc.edu.br",
                'telefone' => "(49) 98883-0613",
            ],
            [
                'nome' => "Gabriel Augusto Weber",
                'cpf' => "456.456.456-45",
                'email' => "gabriel.aw@aluno.ifsc.edu.br",
                'telefone' => "(49) 99154-4587",
            ],
            [
                'nome' => "Daniel Molo",
                'cpf' => "981.981.981-81",
                'email' => "dani.molo@gmail.com",
                'telefone' => "(11) 95684-3155",
            ],
            [
                'nome' => "Lukas Marques",
                'cpf' => "470.470.470-81",
                'email' => "luka.mqs@gmail.com",
                'telefone' => "(11) 99941-3156",
            ],
            [
                'nome' => "José de Alencar",
                'cpf' => "222.222.222-22",
                'email' => "jose.alencar@edu.br",
                'telefone' => "(21) 91111-1111",
            ],
            [
                'nome' => "Machado de Assis",
                'cpf' => "000.000.000-00",
                'email' => "machado.assis@edu.com",
                'telefone' => "(21) 90045-4242",
            ],
        ];

        foreach($hospedes as $hospede) {
            Hospede::create($hospede);
        }  

    }
}
