<?php
namespace App\Http\Controllers;

use App\Models\Chale;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Http\Request;
use PDF;


class ChaleController extends Controller{

    public function index()
    {
        $chales = Chale::all();

        return view('chale.list')->with(['chales'=> $chales]);
    }

    /**
     * Carrega o formulário
     */
    public function create()
    {
        $chales = Chale::orderBy('nome')->get();

        return view('chale.form')->with(['chales'=> $chales]);
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {
        $dados = ['nome'=> $request->nome,
        'cpf'=> $request->cpf,
        'email'=> $request->email,
        'telefone'=>$request->telefone,
        ];

        Chale::create($dados); //ou  $request->all()

        return redirect('chale')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Chale $chale)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $chale = Chale::find($id); //select * from chale where id = $id

        return view('chale.form')->with([
            'chale'=> $chale,
        ]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Chale $chale)
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

        Chale::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return redirect('chale')->with('success', "Atualizado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $chale = Chale::findOrFail($id);

        $chale->delete();

        return redirect('chale')->with('success', "Removido com sucesso!");
    }
    /**
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {

        if(!empty($request->valor)){
            $chales = Chale::where(
                $request->tipo,
                 'like' ,
                "%".$request->valor."%"
                )->get();
        } else {
            $chales = Chale::all();
        }

        return view('chale.list')->with(['chales'=> $chales]);
    }

}
