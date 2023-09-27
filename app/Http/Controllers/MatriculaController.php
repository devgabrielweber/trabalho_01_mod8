<?php
namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Curso;
use App\Models\Turma;
use App\Models\Aluno;
use Illuminate\Http\Request;
use PDF;
use App\Charts\GraficoMatricula;
use App\Charts\MatriculasNotasChart;


class MatriculaController extends Controller{

    public function index()
    {
        $matriculas = Matricula::all();

        return view('matricula.list')->with(['matriculas'=> $matriculas]);
    }

    /**
     * Carrega o formulário
     */
    public function create()
    {
        $cursos = Curso::orderBy('nome')->get();
        $turmas = Turma::orderBy('nome')->get();
        $alunos = Aluno::orderBy('nome')->get();

        return view('matricula.form')->with([
            'cursos'=> $cursos,
            'turmas'=> $turmas,
            'alunos'=> $alunos,
        ]);
    }

    /**
     * Salva os dados do formulário
     */
    public function store(Request $request)
    {
        $request->validate([
            'curso_id'=>'required',
            'turma_id'=>'required',
            'aluno_id'=>'required',
            'data_matricula'=>'required|date',
        ],[
            'curso_id.required'=>"O :attribute é obrigatorio!",
            'turma_id.required'=>"O :attribute é obrigatorio!",
            'aluno_id.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados = ['curso_id'=> $request->curso_id,
            'turma_id'=> $request->turma_id,
            'aluno_id'=> $request->aluno_id,
            'data_matricula'=>$request->data_matricula,
        ];

        Matricula::create($dados); //ou  $request->all()

        return redirect('matricula')->with('success', "Cadastrado com sucesso!");
    }

    /**
     * Carrega apenas 1 registro da tabela
     */
    public function show(Matricula $matricula)
    {
        //
    }

    /**
     * Carrega o formulário para edição
     */
    public function edit($id)
    {
        $matricula = Matricula::find($id); //select * from matricula where id = $id

        $cursos = Curso::orderBy('nome')->get();
        $turmas = Turma::orderBy('nome')->get();
        $alunos = Aluno::orderBy('nome')->get();

        return view('matricula.form')->with([
            'matricula'=> $matricula,
            'cursos'=> $cursos,
            'turmas'=> $turmas,
            'alunos'=> $alunos,
        ]);
    }

    /**
     * Atualiza os dados do formulário
     */
    public function update(Request $request, Matricula $matricula)
    {
        $request->validate([
            'curso_id'=>'required',
            'turma_id'=>'required',
            'aluno_id'=>'required',
            'data_matricula'=>'required|date',
        ],[
            'curso_id.required'=>"O :attribute é obrigatorio!",
            'turma_id.required'=>"O :attribute é obrigatorio!",
            'aluno_id.required'=>"O :attribute é obrigatorio!",
        ]);

        $dados = ['curso_id'=> $request->curso_id,
            'turma_id'=> $request->turma_id,
            'aluno_id'=> $request->aluno_id,
            'data_matricula'=>$request->data_matricula,
        ];

        Matricula::updateOrCreate(
            ['id'=>$request->id],
            $dados);

        return redirect('matricula')->with('success', "Atualizado com sucesso!");

    }

    /**
     * Remove o registro do banco de dados
     */
    public function destroy($id)
    {
        $matricula = Matricula::findOrFail($id);

        $matricula->delete();

        return redirect('matricula')->with('success', "Removido com sucesso!");
    }
    /**
     * pesquisa e filtra o registro do banco de dados
     */
    public function search(Request $request)
    {
        if(!empty($request->valor)){
            $matriculas = Matricula::where(
                $request->tipo,
                 'like' ,
                "%". $request->valor."%"
                )->get();
        } else {
            $matriculas = Matricula::all();
        }

        return view('matricula.list')->with(['matriculas'=> $matriculas]);
    }

    public function report(){
            //select * from matricula order by nome
            $matriculas = Matricula::orderBy('nome')->get();

            $data = [
                'title'=>"Relatorio Listagem de Matriculas",
                'matriculas'=> $matriculas
            ];

            $pdf = PDF::loadView('matricula.report',$data);
            //$pdf->setPaper('a4', 'landscape');
           // dd($pdf);

            return $pdf->download("listagem_matriculas.pdf");
    }

    public function chart(GraficoMatricula $matricula, MatriculasNotasChart $matriculasNotas){

        return view('matricula.chart')->with(['matricula'=>  $matricula->build(),
                      'matriculasNotas'=>  $matriculasNotas->build()
    ]);
    }
}
