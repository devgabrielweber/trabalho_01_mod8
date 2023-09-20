<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Aluno;
use App\Models\CategoriaAluno;
use App\Models\Matricula;

class RelacionamentoController extends Controller
{
    public function index(){

        $aluno = Aluno::with(['matricula','categoria'])->get();

        //acesso o indice do vetor zero
        //depois o relacionamento
        var_dump($aluno[0]->matricula->data_matricula);
        dd($aluno[2]->categoria->nome);

    }

    public function store(){
         /*
        Curso::create(
            [
            'nome'=>"Técnico em Informática",
            'requisito'=>"Nível Fundamental",
            'carga_horaria'=>1200,
            'valor'=>0.0
            ]
        );
        */

       // $curso = Curso::find(1);

       /*
        $turma = Turma::create(
            [
            'nome'=>"TEC_2023_2",
            'curso_id'=> $curso->id,
            'codigo'=>"MTEC_2023_2",
            'data_inicio'=>"2020-01-01",
            'data_fim'=>"2024-12-20",
            'carga_horaria'=>360
            ]
        );

        */
        /*
        $catAluno = CategoriaAluno::create(
            [
                'nome'=>"Graduação",
                'nivel'=>"Superior",
            ]
        );

        $aluno = Aluno::create(
            [
                'nome'=>"Jackson Five",
                'data_nascimento'=>'1987-09-03',
                'cpf'=>"000.555.000-55",
                'email'=>"jackson.meires@ifsc.edu.br",
                'telefone'=>"84 98800-5500",
                'categoria_aluno_id'=>$catAluno->id,
            ]
        );
        dd($aluno);
        */

        $curso = Curso::find(1);
        $turma = Turma::find($curso->id);
        $aluno = Aluno::find($turma->id);

        $matricula = Matricula::create(
            [
                'curso_id'=>$curso->id,
                'turma_id'=>$turma->id,
                'aluno_id'=>$aluno->id,
                'data_matricula'=> date("Y-m-d"),
            ]
        );
        dd($matricula);
    }
}
