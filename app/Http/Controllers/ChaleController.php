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
        $chales = Chale::orderBy('numero')->get();

        return view('chale.form')->with(['chales'=> $chales]);
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {
        $request->validate([
            'numero'=>'required|numeric',
            'pessoas'=>'required|numeric',
            'diaria'=>'required|numeric',
        ],[
            'numero.required'=>"O atributo :attribute é obrigatório!",
            'pessoas.required'=>"O atributo :attribute é obrigatório!",
            'diaria.required'=>"O atributo :attribute é obrigatório!",

            'numero.numeric'=>"O :attribute deve ser do tipo numérico!",
            'pessoas.numeric'=>"O :attribute deve ser do tipo numérico!",
            'diaria.numeric'=>"O :attribute deve ser do tipo numérico!",
        ]);

        $dados = ['numero'=> $request->numero,
        'pessoas'=> $request->pessoas,
        'descricao'=> $request->descricao,
        'foto'=>$request->foto,
        'diaria'=>$request->diaria,
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
            'numero'=>'required|numeric',
            'pessoas'=>'required|numeric',
            'diaria'=>'required|numeric',
        ],[
            'numero.required'=>"O atributo :attribute é obrigatório!",
            'pessoas.required'=>"O atributo :attribute é obrigatório!",
            'diaria.required'=>"O atributo :attribute é obrigatório!",

            'numero.numeric'=>"O :attribute deve ser do tipo numérico!",
            'pessoas.numeric'=>"O :attribute deve ser do tipo numérico!",
            'diaria.numeric'=>"O :attribute deve ser do tipo numérico!",
        ]);

        $dados = ['numero'=> $request->numero,
        'pessoas'=> $request->pessoas,
        'descricao'=> $request->descricao,
        'foto'=>$request->foto,
        'diaria'=>$request->diaria,
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
