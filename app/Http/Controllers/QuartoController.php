<?php
namespace App\Http\Controllers;

use App\Charts\qtdCamas;
use App\Models\Quarto;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Http\Request;
use PDF;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;


class QuartoController extends Controller{

    public function geraGrafico(qtdCamas $qtdCamas)
    {
        return view('quarto.chart', ['chart' => $qtdCamas->build()]);
    }


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
            'foto'=>'required'
        ],[
            'numero.required'=>"O :attribute é obrigatorio!",
            'numero.numeric'=>"O :attribute deve ser numerico!",
            'qtd_camas.required'=>"O :attribute é obrigatorio!",
            'qtd_camas.numeric'=>"O :attribute deve ser numerico!",
            'descricao.required'=>"O :attribute é obrigatorio!",
            'diaria.required'=>"O :attribute é obrigatorio!",
            'diaria.numeric'=>"O :attribute deve ser numerico!",
            'foto.required'=>"A :attribute é obrigatória!",
        ]);

        $foto = $request->file('foto');
        //verifica se existe foto no formulário
        if($foto){
            $nome_arquivo =
            date('YmdHis').'.'.$foto->getClientOriginalExtension();

            $diretorio = "images/quarto/";
            //salva foto em uma pasta do sistema


            $foto->storeAs($diretorio,$nome_arquivo,'public');

        }

        $dados = ['numero'=> $request->numero,
        'qtd_camas'=> $request->qtd_camas,
        'descricao'=> $request->descricao,
        'diaria'=>$request->diaria,
        'foto'=>$nome_arquivo
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
    public function update(Request $request, Quarto $quarto, $id)
    {

        $quarto = Quarto::find($id);


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



        $foto = $request->file('foto');
        if($quarto->foto) {
            $nome_arquivo = $quarto->foto;
        }
        else {
            $nome_arquivo = "";
        }

        
        //verifica se existe foto no formulário
        if($foto){
            $nome_arquivo =
            date('YmdHis').'.'.$foto->getClientOriginalExtension();

            $diretorio = "images/quarto/";
            //salva foto em uma pasta do sistema


            $foto->storeAs($diretorio,$nome_arquivo,'public');

        }

        
        $dados = ['numero'=> $request->numero,
        'qtd_camas'=> $request->qtd_camas,
        'descricao'=> $request->descricao,
        'diaria'=>$request->diaria,
        'foto'=>$nome_arquivo,
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

        $caminhoFoto = public_path().'/storage/images/quarto/'.$quarto->foto;


        if($quarto->foto != 'sem_foto.jpg' && $quarto->foto != '') {
            unlink($caminhoFoto);   //DELETA O ARQUIVO DE FOTO DA PASTA STORAGE
        }
        
        $quarto->delete();      //DELETA O REGISTRO DO BANCO

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
