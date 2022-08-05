<?php

namespace App\Charts;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ProductChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        /*$values = Http::get('http://127.0.0.1:5000');
        $jsondata = $values->json();
        return $this->chart->pieChart()
            ->setTitle('Les produits les plus recherchés')
            ->setSubtitle('TarzanBI Database')
            ->addData([json_decode($jsondata)])
            ->setLabels([json_decode($jsondata)]);*/

        return $this->chart->pieChart()
        ->setTitle('Les produits les plus recherchés')
        ->setSubtitle('TarzanBI Database')
        ->addData([400, 120, 90, 140])
        ->setLabels(['Ordinateurs', 'Imprimantes', 'Iphones', 'Congélateurs']);
        
    }
}
