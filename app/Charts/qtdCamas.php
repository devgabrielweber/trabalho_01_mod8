<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Models\Quarto;
use ArielMejiaDev\LarapexCharts\LarapexChart;


class qtdCamas extends Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    } 
   
    public function build()
    {

        $quartos = Quarto::all();

        $qtdCamas = [];
        $numQuarto = [];
        foreach ($quartos as $quarto) {
            array_push($qtdCamas, $quarto->qtd_camas);
            array_push($numQuarto, $quarto->numero);
        }

        return $this->chart->barChart()
            ->setTitle('Quantidade de camas por quarto')
            ->addData('qtdCamas',$qtdCamas)
            ->setLabels($numQuarto);
    }
}
