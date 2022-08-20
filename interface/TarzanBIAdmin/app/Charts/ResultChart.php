<?php

namespace App\Charts;
use ResultController\result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ResultChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    protected function labelArray(int $number, array $res)
    {
        $labelarray = [];
        for ($i=0; $i < $number; $i++) {
            $labelarray[$i] = $res[$i]->City;
        }
        return $labelarray;
    }


    public function build(REQUEST $request2): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $data = Http::get('http://127.0.0.1:5000/', [
            'produit' => $request2->produit,
            'nbre' => $request2->nbre
        ]);

        $result = DB::table('commandes')
                      ->select(DB::raw('SUM(Quantity) as Qte'), 'City')
                      ->where('Description', '=', $request2->produit)
                      ->groupBy('City')
                      ->get();


        //dd($result);
        // $array = json_decode(json_encode($result), true);


        // $produits = DB::table('commandes')
        //                 ->select('Description')
        //                 ->get();


        return $this->chart->barChart()
        ->setTitle('Classement du taux des achats par ville')
        ->setSubtitle('TarzanBI Database')
        ->addData($request2->produit,
        [
            $result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte

            // $i=0;
            // for ($i=0; i<count($result); $i++){
            //     $result[$i]->Qte;
            // }

        ])
        ->setXAxis([
            $result[0]->City, $result[1]->City, $result[2]->City, $result[3]->City, $result[4]->City, $result[5]->City
            //$this->labelArray(count($result), (array)$result)
        ]);
    }



}
