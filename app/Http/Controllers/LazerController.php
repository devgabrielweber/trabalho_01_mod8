<?php
namespace App\Http\Controllers;

use App\Models\Lazer;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Http\Request;
use PDF;


class LazerController extends Controller{

    public function index()
    {
        $lazer = Lazer::all();

        return view('lazer.list')->with(['lazer'=> $lazer]);
    }

    /**
     * Carrega o formulário
     */
    public function create()
    {
        $lazer = Lazer::orderBy('nome')->get();

        return view('lazer.form')->with(['lazer'=> $lazer]);
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {

        $request->validate([
            'nome'=>'required|alpha',
            'descricao'=>'required|alpha',
            'valor'=>'required|numeric',
            'foto'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'nome.alpha'=>"O :attribute não deve conter números!",
            'descricao.alpha'=>"O :attribute não deve conter números!",
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

        Lazer::create($dados); //ou  $request->all()

        return redirect('lazer')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Lazer $lazer)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $lazer = Lazer::find($id); //select * from lazer where id = $id

        return view('lazer.form')->with([
            'lazer'=> $lazer,
        ]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Lazer $lazer)
    {
        $request->validate([
            'nome'=>'required|alpha',
            'descricao'=>'required|alpha',
            'valor'=>'required|numeric',
            'foto'=>'required',
        ],[
            'nome.required'=>"O :attribute é obrigatorio!",
            'nome.alpha'=>"O :attribute não deve conter números!",
            'descricao.alpha'=>"O :attribute não deve conter números!",
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

        Lazer::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return redirect('lazer')->with('success', "Atualizado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $lazer = Lazer::findOrFail($id);

        $lazer->delete();

        return redirect('lazer')->with('success', "Removido com sucesso!");
    }
    /** 
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {

        if(!empty($request->valor)){
            $lazer = Lazer::where(
                $request->tipo,
                 'like' ,
                "%".$request->valor."%"
                )->get();
        } else {
            $lazer = Lazer::all();
        }

        return view('lazer.list')->with(['lazer'=> $lazer]);
    }

}
