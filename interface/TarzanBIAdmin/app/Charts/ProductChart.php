<?php

namespace App\Charts;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $prod = DB::table('commandes')
                    ->select(DB::raw('SUM(Quantity) as Qte'), 'Description')
                    ->orderByDesc('Qte')
                    ->groupBy('Description')
                    ->limit(5)
                    ->get();

        //dd($prod[0]->Qte);

        return $this->chart->pieChart()
        ->setTitle('Les produits les plus recherchés')
        ->setSubtitle('TarzanBI Database')
        ->addData([$prod[0]->Qte, $prod[1]->Qte, $prod[2]->Qte, $prod[3]->Qte, $prod[4]->Qte])
        ->setLabels([(array)$prod[0]->Description, (array)$prod[1]->Description, (array)$prod[2]->Description,(array)$prod[3]->Description, (array)$prod[4]->Description]);
    }

    // public static function labelArray(int $number, array $prod)
    // {
    //     $labelarray = [];
    //     for ($i=0; $i < $number; $i++) {
    //         $labelarray[$i] = $prod[$i]->Description;
    //     }
    //     dd($labelarray);
    //     return $labelarray;
    // }
}
