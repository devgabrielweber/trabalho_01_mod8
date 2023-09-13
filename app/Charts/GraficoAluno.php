<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class GraficoAluno
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        return $this->chart->pieChart()
            ->setTitle('3 Ultimas notas')
            ->setSubtitle('Provas de matemática')
            ->addData([9, 5, 10])
            ->setLabels(['Ana', 'Maria', 'Chaves']);
    }
}
