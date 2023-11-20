<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Espaco;

class EspacoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $espacos = [
            [
                'nome' => "Piscina",
                'descricao' => "Acesso à piscina do hotel, em tamanho olímpico",
                'valor' => "29.99",
                'foto' => "piscina.jpg",
                
            ],
        ];

        foreach($espacos as $espaco) {
            Espaco::create($espaco);
        }
    }
}
