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
        //adresse IP du pc sur lequel le srveur est lance
        $data = Http::get('http://192.168.43.4:5000/', [
            'produit' => $request2->produit,
            'nbre' => $request2->nbre
        ]);

        $result = DB::table('commandes')
                      ->select(DB::raw('SUM(Quantity) as Qte'), 'City')
                      ->where('Description', '=', $request2->produit)
                      ->groupBy('City')
                      ->get();


        //dd($result[0]->City);
        // $i=0;
            // for ($i=0; i<count($result); $i++){
            //     $result[$i]->Qte;
            // }
        
            $tab=[];
            $tab2 = [];
            if(count($result) == 0){
                $tab = ["Aucun résultat trouvé"];
                $tab2 = ["Aucun résultat trouvé"];
            }else if(count($result) == 1){
                $tab = [$result[0]->Qte];
                $tab2 = [$result[0]->City];
            }else if(count($result) == 2){
                $tab = [$result[0]->Qte, $result[1]->Qte];
                $tab2 = [$result[0]->City, $result[2]->City];
            }else if(count($result) == 3){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte];
                $tab2 = [$result[0]->City, $result[1]->City, $result[2]->City];
            }else if(count($result) == 4){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte];
                $tab2 = [$result[0]->City, $result[1]->City, $result[2]->City, $result[3]->City];
            }else if(count($result) == 5){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte];
                $tab2 = [$result[0]->City, $result[1]->City, $result[2]->City, $result[3]->City, $result[4]->City];
            }else if(count($result) == 6){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte];
                $tab2 = [$result[0]->City, $result[1]->City, $result[2]->City, $result[3]->City, $result[4]->City, $result[5]->City];
            }else{
                $tab = ["Aucun résultat trouvé"];
                $tab2 = ["Aucun résultat trouvé"];
            }
            
        //dd($tab2);
        return $this->chart->barChart()
        ->setTitle('Classement du taux des achats par ville')
        ->setSubtitle('TarzanBI Database')
        ->addData($request2->produit,$tab)
            //$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte
        ->setXAxis($tab2);
            //$result[0]->City, $result[1]->City, $result[2]->City, $result[3]->City, $result[4]->City, $result[5]->City
    }



}
