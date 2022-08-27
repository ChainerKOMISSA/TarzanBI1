<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class StatsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function getmonth(){}

    public function build(REQUEST $request2): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        //adresse IP du pc sur lequel le srveur est lance
        $data = Http::get('http://192.168.43.4:5000/stats', [
            'produit' => $request2->produit,
            'nbre' => $request2->nbre,
            'mois' => $request2-> mois
        ]);

        $month = 'mois';

        if ($request2-> mois == "Janvier"){
            $month = '%/01/%';
        }
        else if ($request2-> mois == "Février"){
            $month = '%/02/%';
        }
        else if ($request2-> mois == "Mars"){
            $month = '%/03/%';
        }
        else if ($request2-> mois == "Avril"){
            $month = '%/04/%';
        }
        else if ($request2-> mois == "Mai"){
            $month = '%/05/%';
        }
        else if ($request2-> mois == "Juin"){
            $month = '%/06/%';
        }
        else if ($request2-> mois == "Juillet"){
            $month = '%/07/%';
        }

        $result = DB::table('commandes')
                      ->select(DB::raw('SUM(Quantity) as Qte'), 'InvoiceDate')
                      ->where('Description','=' ,$request2->produit)
                      ->groupBy('InvoiceDate')
                      ->having('InvoiceDate', 'like', $month)
                      ->get();

        //dd($result);
            $tab=[];
            $tab2 = [];
            if(count($result) == 0){
                $tab = ["Aucun résultat trouvé"];
                $tab2 = ["Aucun résultat trouvé"];
            }else if(count($result) == 1){
                $tab = [$result[0]->Qte];
                $tab2 = [$result[0]->InvoiceDate];
            }else if(count($result) == 2){
                $tab = [$result[0]->Qte, $result[1]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate];
            }else if(count($result) == 3){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate];
            }else if(count($result) == 4){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate];
            }else if(count($result) == 5){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate];
            }else if(count($result) == 6){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate];
            }else if(count($result) == 7){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte, $result[6]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate, $result[6]->InvoiceDate];
            }else if(count($result) == 8){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte, $result[6]->Qte, $result[7]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate, $result[6]->InvoiceDate, $result[7]->InvoiceDate];
            }else if(count($result) == 9){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte, $result[6]->Qte, $result[7]->Qte, $result[8]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate, $result[6]->InvoiceDate, $result[7]->InvoiceDate, $result[8]->InvoiceDate];
            }else if(count($result) == 10){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte, $result[6]->Qte, $result[7]->Qte, $result[8]->Qte, $result[9]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate, $result[6]->InvoiceDate, $result[7]->InvoiceDate, $result[8]->InvoiceDate, $result[9]->InvoiceDate];
            }else if(count($result) == 11){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte, $result[6]->Qte, $result[7]->Qte, $result[8]->Qte, $result[9]->Qte, $result[10]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate, $result[6]->InvoiceDate, $result[7]->InvoiceDate, $result[8]->InvoiceDate, $result[9]->InvoiceDate, $result[10]->InvoiceDate];
            }else if(count($result) == 12){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte, $result[6]->Qte, $result[7]->Qte, $result[8]->Qte, $result[9]->Qte, $result[10]->Qte, $result[11]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate, $result[6]->InvoiceDate, $result[7]->InvoiceDate, $result[8]->InvoiceDate, $result[9]->InvoiceDate, $result[10]->InvoiceDate, $result[11]->InvoiceDate];
            }else if(count($result) == 13){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte, $result[6]->Qte, $result[7]->Qte, $result[8]->Qte, $result[9]->Qte, $result[10]->Qte, $result[11]->Qte, $result[12]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate, $result[6]->InvoiceDate, $result[7]->InvoiceDate, $result[8]->InvoiceDate, $result[9]->InvoiceDate, $result[10]->InvoiceDate, $result[11]->InvoiceDate, $result[12]->InvoiceDate];
            }else if(count($result) == 14){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte, $result[6]->Qte, $result[7]->Qte, $result[8]->Qte, $result[9]->Qte, $result[10]->Qte, $result[11]->Qte, $result[12]->Qte, $result[13]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate, $result[6]->InvoiceDate, $result[7]->InvoiceDate, $result[8]->InvoiceDate, $result[9]->InvoiceDate, $result[10]->InvoiceDate, $result[11]->InvoiceDate, $result[12]->InvoiceDate, $result[13]->InvoiceDate];
            }else if(count($result) == 15){
                $tab = [$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte, $result[5]->Qte, $result[6]->Qte, $result[7]->Qte, $result[8]->Qte, $result[9]->Qte, $result[10]->Qte, $result[11]->Qte, $result[12]->Qte, $result[13]->Qte, $result[14]->Qte];
                $tab2 = [$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate, $result[5]->InvoiceDate, $result[6]->InvoiceDate, $result[7]->InvoiceDate, $result[8]->InvoiceDate, $result[9]->InvoiceDate, $result[10]->InvoiceDate, $result[11]->InvoiceDate, $result[12]->InvoiceDate, $result[13]->InvoiceDate, $result[14]->InvoiceDate];
            }else{
                $tab = ["Aucun résultat trouvé"];
                $tab2 = ["Aucun résultat trouvé"];
            }

        return $this->chart->areaChart()
            ->setTitle('Statistiques par mois')
            ->setSubtitle('TarzanBI Database')
            ->addData($request2->produit,$tab)
            //[$result[0]->Qte, $result[1]->Qte, $result[2]->Qte, $result[3]->Qte, $result[4]->Qte]
            ->setXAxis($tab2)
            //[$result[0]->InvoiceDate, $result[1]->InvoiceDate, $result[2]->InvoiceDate, $result[3]->InvoiceDate, $result[4]->InvoiceDate]
            ->setMarkers(['#ffc63b'])
            ->setGrid();
    }


}
