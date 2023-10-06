<?php
namespace App\Http\Controllers;

use App\Models\Hospede;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Http\Request;
use PDF;


class HospedeController extends Controller{

    public function index()
    {
        $hospedes = Hospede::all();

        return view('hospede.list')->with(['hospedes'=> $hospedes]);
    }

    /**
     * Carrega o formulário
     */
    public function create()
    {
        $hospedes = Hospede::orderBy('nome')->get();

        return view('hospede.form')->with(['hospedes'=> $hospedes]);
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome'=>'required|max:100',
            'cpf'=>'required|max:14',
            'telefone'=>'required|max:25',
            'email'=>'required|max:80',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'nome.max'=>" Só é permitido 120 caracteres no :attribute !",
            'cpf.required'=>"O :attribute é obrigatorio!",
            'cpf.max'=>" Só é permitido 14 caracteres no :attribute !",
            'telefone.required'=>"O :attribute é obrigatorio!",
            'telefone.max'=>" Só é permitido 25 caracteres no :attribute !",
            'email.required'=>"O :attribute é obrigatorio!",
            'email.max'=>" Só é permitido 80 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
        'cpf'=> $request->cpf,
        'email'=> $request->email,
        'telefone'=>$request->telefone,
        ];

        Hospede::create($dados); //ou  $request->all()

        return redirect('hospede')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Hospede $hospede)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $hospede = Hospede::find($id); //select * from hospede where id = $id

        return view('hospede.form')->with([
            'hospede'=> $hospede,
        ]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Hospede $hospede)
    {
        $request->validate([
            'nome'=>'required|max:100',
            'cpf'=>'required|max:14',
            'telefone'=>'required|max:25',
            'email'=>'required|max:80',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'nome.max'=>" Só é permitido 120 caracteres no :attribute !",
            'cpf.required'=>"O :attribute é obrigatorio!",
            'cpf.max'=>" Só é permitido 14 caracteres no :attribute !",
            'telefone.required'=>"O :attribute é obrigatorio!",
            'telefone.max'=>" Só é permitido 25 caracteres no :attribute !",
            'email.required'=>"O :attribute é obrigatorio!",
            'email.max'=>" Só é permitido 80 caracteres no :attribute !",
        ]);

        $dados = ['nome'=> $request->nome,
        'cpf'=> $request->cpf,
        'email'=> $request->email,
        'telefone'=>$request->telefone,
        ];

        Hospede::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return redirect('hospede')->with('success', "Atualizado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $hospede = Hospede::findOrFail($id);

        $hospede->delete();

        return redirect('hospede')->with('success', "Removido com sucesso!");
    }
    /**
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {

        if(!empty($request->valor)){
            $hospedes = Hospede::where(
                $request->tipo,
                 'like' ,
                "%".$request->valor."%"
                )->get();
        } else {
            $hospedes = Hospede::all();
        }

        return view('hospede.list')->with(['hospedes'=> $hospedes]);
    }

}
