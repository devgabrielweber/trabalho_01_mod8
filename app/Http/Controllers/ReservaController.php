<?php
namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Hospede;
use App\Models\Quarto;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade\Pdf;

class ReservaController extends Controller{
    
    public function gerarPDF()
    {
        // Recupere dados do banco de dados
        $reservas = Reserva::all();
    
        // Carregue a visualização com os dados
        $pdf = PDF::loadView('relatorio-reservas.index', compact('reservas'))->setOptions(['defaultFont' => 'sans-serif']);
    
        // Faça o download do PDF ou exiba no navegador
        return $pdf->download('relatorio.pdf');
    }
    

    public function index()
    {
        $reservas = Reserva::all();

        return view('reserva.list')->with(['reservas'=> $reservas]);
    }

    /**
     * Carrega o formulário
     */
    public function create()
    {
        $reserva = Reserva::orderBy('id')->get();
        $hospedes = Hospede::orderBy('id')->get();
        $quartos = Quarto::orderBy('id')->get();

        return view('reserva.form')->with([
            'reserva'=> $reserva,
            'hospedes'=> $hospedes,
            'quartos'=> $quartos,
        ]);
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {
        $request->validate([
            'hospede_id'=>'required',
            'quarto_id'=>'required',
            'data_inicio'=>'required',
            'data_fim'=>'required',
        ],[
            'hospede_id.required'=>"O :attribute é obrigatorio!",
            'quarto_id.required'=>"O :attribute é obrigatorio!",
            'data_inicio.required'=>"O :attribute é obrigatorio!",
            'data_fim.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados = [
            'hospede_id'=> $request->hospede_id,
            'quarto_id'=> $request->quarto_id,
            'data_inicio'=> $request->data_inicio,
            'data_fim'=>$request->data_fim,
        ];

       $reserva = Reserva::create($dados); //ou  $request->all()
        return view('reserva.adicional')->with(['reserva'=>$reserva]);
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Reserva $reserva)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $reserva = Reserva::find($id); //select * from reserva where id = $id
        $hospedes = Hospede::orderBy('id')->get();
        $quartos = Quarto::orderBy('id')->get();

        $data_inicio = $reserva->data_inicio;

        return view('reserva.form')->with([
            'id' => $id,
            'reserva'=> $reserva,
            'quartos'=>$quartos,
            'hospedes'=>$hospedes,
        ]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Reserva $reserva)
    {
        $request->validate([
            'hospede_id'=>'required',
            'quarto_id'=>'required',
            'data_inicio'=>'required',
            'data_fim'=>'required',
        ],[
            'hospede_id.required'=>"O :attribute é obrigatorio!",
            'quarto_id.required'=>"O :attribute é obrigatorio!",
            'data_inicio.required'=>"O :attribute é obrigatorio!",
            'data_fim.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados = [
            'hospede_id'=> $request->hospede_id,
            'quarto_id'=> $request->quarto_id,
            'data_inicio'=> $request->data_inicio,
            'data_fim'=>$request->data_fim,
        ];
        

        Reserva::updateOrCreate(
            ['id' => $request->id],
            $dados
        );

        return redirect('reserva')->with('success', "Alterado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);

        $reserva->delete();

        return redirect('reserva')->with('success', "Removido com sucesso!");
    }
    /**
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {

        if(!empty($request->valor)){
            $reservas = Reserva::where(
                $request->tipo,
                 'like' ,
                "%".$request->valor."%"
                )->get();
        } else {
            $reservas = Reserva::all();
        }
        
        return view('reserva.list')->with(['reservas'=> $reservas]);
    }

}
