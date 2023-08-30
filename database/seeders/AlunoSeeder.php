<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AlunoSeeder extends Seeder
{
    public function run(): void
    {
        $fake = Faker::create("pt_BR");
        foreach(\range(1,5) as $index){
            DB::table('aluno')->insert(
                ['nome'=>$fake->name,
                 'email'=>$fake->email,
                 'telefone'=>$fake->phoneNumber,
                 'data_nascimento'=>$fake->date,
                 'cpf'=>$fake->number,
                ]
            );
        }
    }
}
