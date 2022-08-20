<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class Cmd2Chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        return $this->chart->lineChart()
            ->setTitle('Graphe du nombre de commandes par jour')
            ->setSubtitle('TarzanBI Database')
            ->addData('Commandes', [40, 93, 35, 42, 18, 82])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
