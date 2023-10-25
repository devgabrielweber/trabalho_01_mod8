<?php
namespace App\Http\Controllers;

use App\Models\Adicional;
use App\Models\Hospede;
use App\Models\Quarto;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Http\Request;
use PDF;


class AdicionalController extends Controller{

    public function index()
    {
        $adicionais = Adicional::all();

        return view('adicional.list')->with(['adicionais'=> $adicionais]);
    }

    /**
     * Carrega o formulário
     */
    public function create()
    {
        $hospedes = Hospede::orderBy('nome')->get();

        $quarto = Quarto::orderBy('numero')->get();

        return view('adicional.form')->with(['hospedes'=> $hospedes, 'quartos'=>$quarto]);
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

        Adicional::create($dados); //ou  $request->all()

        return redirect('adicional')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Adicional $adicional)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $adicional = Adicional::find($id); //select * from adicional where id = $id

        return view('adicional.form')->with([
            'adicional'=> $adicional,
        ]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Adicional $adicional)
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

        Adicional::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return redirect('adicional')->with('success', "Atualizado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $adicional = Adicional::findOrFail($id);

        $adicional->delete();

        return redirect('adicional')->with('success', "Removido com sucesso!");
    }
    /**
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {

        if(!empty($request->valor)){
            $adicionais = Adicional::where(
                $request->tipo,
                 'like' ,
                "%".$request->valor."%"
                )->get();
        } else {
            $adicionais = Adicional::all();
        }

        return view('adicional.list')->with(['adicionais'=> $adicionais]);
    }

}
