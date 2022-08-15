<?php

namespace App\Charts;
use ResultController;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ResultChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        return $this->chart->barChart()
            ->setTitle('Classement du taux des achats par ville')
            ->setSubtitle('TarzanBI Database')
            ->addData('Ordinateurs', [15, 9, 3, 80, 15, 110])
            ->setXAxis(['Aného', 'Atakpamé', 'Dapaong', 'Kara', 'Kpalimé', 'Lomé', 'Sokodé']);
    }
}
