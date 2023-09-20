<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Aluno;

class AlunosNotasChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {

        $qtdAlunos = Aluno::all()->count();

       // dd($qtdAlunos);

        return $this->chart->barChart()
            ->setTitle('Notas Alunos')
            ->setSubtitle('Media das notas das turmas')
            ->addData('Mod 7', [$qtdAlunos, 9, 3, 4, 10, 8])
            ->addData('Mod 8', [7, 3, 8, 2, 6, 4])
            ->setXAxis(['prova01', 'prova02', 'prova03', 'prova04', 'prova05', 'prova06']);
    }
}
