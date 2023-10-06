<?php
namespace App\Http\Controllers;

use App\Models\Quarto;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Http\Request;
use PDF;


class QuartoController extends Controller{

    public function index()
    {
        $quartos = Quarto::all();

        return view('quarto.list')->with(['quartos'=> $quartos]);
    }

    /**
     * Carrega o formulário
     */
    public function create()
    {
        $quartos = Quarto::orderBy('numero')->get();

        return view('quarto.form')->with(['quartos'=> $quartos]);
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {

        $request->validate([
            'numero'=>'required|numeric',
            'qtd_camas'=>'required|numeric',
            'descricao'=>'required',
            'diaria'=>'required|numeric',
        ],[
            'numero.required'=>"O :attribute é obrigatorio!",
            'numero.numeric'=>"O :attribute deve ser numerico!",
            'qtd_camas.required'=>"O :attribute é obrigatorio!",
            'qtd_camas.numeric'=>"O :attribute deve ser numerico!",
            'descricao.required'=>"O :attribute é obrigatorio!",
            'diaria.required'=>"O :attribute é obrigatorio!",
            'diaria.numeric'=>"O :attribute deve ser numerico!",
        ]);

        $dados = ['numero'=> $request->numero,
        'qtd_camas'=> $request->qtd_camas,
        'descricao'=> $request->descricao,
        'diaria'=>$request->diaria,
        ];

        Quarto::create($dados); //ou  $request->all()

        return redirect('quarto')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Quarto $quarto)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $quarto = Quarto::find($id); //select * from quarto where id = $id

        return view('quarto.form')->with([
            'quarto'=> $quarto,
        ]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Quarto $quarto)
    {
        $request->validate([
            'numero'=>'required',
            'qtd_camas'=>'required',
            'descricao'=>'required',
            'diaria'=>'required',
        ],[
            'numero.required'=>"O :attribute é obrigatorio!",
            'qtd_camas.required'=>"O :attribute é obrigatorio!",
            'descricao.required'=>"O :attribute é obrigatorio!",
            'diaria.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados = ['numero'=> $request->numero,
        'qtd_camas'=> $request->qtd_camas,
        'descricao'=> $request->descricao,
        'diaria'=>$request->diaria,
        ];

        Quarto::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return redirect('quarto')->with('success', "Atualizado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $quarto = Quarto::findOrFail($id);

        $quarto->delete();

        return redirect('quarto')->with('success', "Removido com sucesso!");
    }
    /**
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {

        if(!empty($request->valor)){
            $quartos = Quarto::where(
                $request->tipo,
                 'like' ,
                "%".$request->valor."%"
                )->get();
        } else {
            $quartos = Quarto::all();
        }

        return view('quarto.list')->with(['quartos'=> $quartos]);
    }

}
