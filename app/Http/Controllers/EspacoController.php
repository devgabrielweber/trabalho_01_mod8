<?php
namespace App\Http\Controllers;

use App\Models\Espaco;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Http\Request;
use PDF;


class EspacoController extends Controller{

    public function index()
    {
        $espaco = Espaco::all();

        return view('espaco.list')->with(['espaco'=> $espaco]);
    }

    /**
     * Carrega o formulário
     */
    public function create()
    {
        $espaco = Espaco::orderBy('nome')->get();

        return view('espaco.form')->with(['espaco'=> $espaco]);
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome'=>'required',
            'descricao'=>'required',
            'valor'=>'required|numeric',
            'foto'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'descricao.required'=>"O :attribute é obrigatorio!",
            'valor.required'=>"O :attribute é obrigatorio!",
            'valor.numeric'=>"O :attribute deve ser numerico!",
            'foto.required'=>"O :attribute é obrigatorio!",
            ]);

        $dados = ['nome'=> $request->nome,
        'valor'=> $request->valor,
        'descricao'=> $request->descricao,
        'foto'=>$request->foto,
        ];

        Espaco::create($dados); //ou  $request->all()

        return redirect('espaco')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Espaco $espaco)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $espaco = Espaco::find($id); //select * from espaco where id = $id

        return view('espaco.form')->with([
            'espaco'=> $espaco,
        ]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Espaco $espaco)
    {
        $request->validate([
            'nome'=>'required|alpha',
            'valor'=>'required|numeric',
            'foto'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'descricao.required'=>"O :attribute é obrigatorio!",
            'valor.required'=>"O :attribute é obrigatorio!",
            'valor.numeric'=>"O :attribute deve ser numerico!",
            'foto.required'=>"O :attribute é obrigatorio!",
            ]);


        $dados = ['nome'=> $request->nome,
        'valor'=> $request->valor,
        'descricao'=> $request->descricao,
        'foto'=>$request->foto,
        ];

        Espaco::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return redirect('espaco')->with('success', "Atualizado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $espaco = Espaco::findOrFail($id);

        $espaco->delete();

        return redirect('espaco')->with('success', "Removido com sucesso!");
    }
    /** 
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {

        if(!empty($request->valor)){
            $espaco = Espaco::where(
                $request->tipo,
                 'like' ,
                "%".$request->valor."%"
                )->get();
        } else {
            $espaco = Espaco::all();
        }

        return view('espaco.list')->with(['espaco'=> $espaco]);
    }

}
