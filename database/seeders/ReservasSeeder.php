<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reserva;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservas = [
            [
                'hospede_id' => 1,
                'quarto_id' => 2,
                'data_inicio' => "2023-10-04",
                'data_fim' => "2023-10-10",
            ],
            [
                'hospede_id' => 2,
                'quarto_id' => 2,
                'data_inicio' => "2023-10-11",
                'data_fim' => "2023-10-14",
            ],
            [
                'hospede_id' => 5,
                'quarto_id' => 1,
                'data_inicio' => "2023-10-04",
                'data_fim' => "2023-10-10",
            ],
            [
                'hospede_id' => 3,
                'quarto_id' => 3,
                'data_inicio' => "2023-12-23",
                'data_fim' => "2023-12-31",
            ],
        ];

        foreach($reservas as $reserva) {
            Reserva::create($reserva);
        }
    }
}
