<?php

namespace App\Charts;

use App\Models\Espaco;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

use ArielMejiaDev\LarapexCharts\LarapexChart;
class espacoChart extends Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   
    public function build()
    {

        $espacos = Espaco::all();

        $precoEspacos = [];
        $nomeEspacos = [];
        foreach ($espacos as $espaco) {
            array_push($precoEspacos, $espaco->valor);
            array_push($nomeEspacos, $espaco->nome);
        }

        return $this->chart->barChart()
            ->setTitle('Preco dos adicionais')
            ->addData('preco espacos',$precoEspacos)
            ->setLabels($nomeEspacos);
    }
}
