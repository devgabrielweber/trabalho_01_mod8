<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ramal;

class RamaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ramals = [
            [
                'nome' => "Administrativo",
                'telefone' => "0600",
                'responsavel' => "Hiury",
            ],
            [
                'nome' => "Recepção",
                'telefone' => "0400",
                'responsavel' => "Weber",
            ],
            [
                'nome' => "Gerencia",
                'telefone' => "0500",
                'responsavel' => "Riboli",
            ],
        ];

        foreach($ramals as $ramal) {
            Ramal::create($ramal);
        }

    }
}
