<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    /**
     * Carrega a listagem de dados
     */
    public function index()
    {
        $alunos = Aluno::all();

        return view('aluno.list')->with(['alunos'=> $alunos]);
    }

    /**
     * Carrega o formulário
     */
    public function create()
    {
        return view('aluno.form');
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome'=>'required|max:100',
            'cpf'=>'required|max:14'
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'nome.max'=>" Só é permitido 120 caracteres no :attribute !",
            'cpf.required'=>"O :attribute é obrigatorio!",
            'cpf.max'=>" Só é permitido 14 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'data_nascimento'=> $request->data_nascimento,
            'cpf'=> $request->cpf,
            'email'=> $request->email,
            'telefone'=>$request->telefone
        ];

        Aluno::create($dados); //ou  $request->all()

        return redirect('aluno')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Aluno $aluno)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $aluno = Aluno::find($id); //select * from aluno where id = $id

        return view('aluno.form')->with(['aluno'=>$aluno]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Aluno $aluno)
    {
        $request->validate([
            'nome'=>'required|max:100',
            'cpf'=>'required|max:14'
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'nome.max'=>" Só é permitido 120 caracteres no :attribute !",
            'cpf.required'=>"O :attribute é obrigatorio!",
            'cpf.max'=>" Só é permitido 14 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
            'data_nascimento'=> $request->data_nascimento,
            'cpf'=> $request->cpf,
            'email'=> $request->email,
            'telefone'=>$request->telefone
        ];

        Aluno::updateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('aluno')->with('success', "Atualizado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy(Aluno $aluno)
    {
        //
    }
}
