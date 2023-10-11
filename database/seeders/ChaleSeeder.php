<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Chale;

class ChaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chales = [
            [
                'numero' => 123,
                'pessoas' => 4,
                'descricao' => "Chalé Bonito",
                'foto' => "https://distribuidoradnc.com.br/wp-content/uploads/2023/02/IMG_7476.jpg",
            ],
            [
                'numero' => 666,
                'pessoas' => 6,
                'descricao' => "Habitado por algum demônio",
                'foto' => "https://www.creativefabrica.com/wp-content/uploads/2022/11/15/Haunted-Cottage-In-The-Middle-Of-The-Forest-Tim-Allen-46829517-1.png"],
            [
                
                'numero' => 875,
                'pessoas' => 3,
                'descricao' => "Espaçoso, mal iluminado,confortável",
                'foto' => "https://media-cdn.tripadvisor.com/media/photo-s/1c/03/ee/fd/chales-encanto-das-pedras.jpg"]
        ];

        foreach($chales as $chale) {
            Chale::create($chale);
        }  

    }
}
