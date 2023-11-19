<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quarto;

class QuartosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quartos = [
            [
                'numero' => 440,
                'qtd_camas' => 1,
                'descricao' => "Suíte para 2 pessoas. SMART TV 50'' e ar condicionado",
                'diaria' => 249.99,
                'foto' => 'images/quarto/q1.jpg',
            ],
            [
                'numero' => 103,
                'qtd_camas' => 2,
                'descricao' => "Quarto para até 4 pessoas. Equipado com frigobar, um banheiro e aquecedor elétrico",
                'diaria' => 299.99,
                'foto' => 'images/quarto/q2.jpg',
            ],
            [
                'numero' => 102,
                'qtd_camas' => 3,
                'descricao' => "1 cama de casal e duas de solteiro. Planejado para o maior conforto para famílias viajando",
                'diaria' => 399.99,
                'foto' => 'images/quarto/q3.jpg',
            ],
        ];

        foreach($quartos as $quarto) {
            Quarto::create($quarto);
        }
        
    }
}
