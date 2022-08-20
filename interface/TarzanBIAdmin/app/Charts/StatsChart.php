<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class StatsChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(REQUEST $request2): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $data = Http::get('http://127.0.0.1:5000/stats', [
            'produit' => $request2->produit,
            'nbre' => $request2->nbre,
            'jour' => $request2-> mois
        ]);

        $month = " ";
        if ($request2-> mois == "Janvier" || "janvier"){
            $month == "%/01/%";
        }
        else if ($request2-> mois == "Février" || "février"){
            $month == "%/02/%";
        }
        else if ($request2-> mois == "Mars" || "mars"){
            $month == "%/03/%";
        }
        else if ($request2-> mois == "Avril" || "avril"){
            $month == "%/04/%";
        }
        else if ($request2-> mois == "Mai" || "mai"){
            $month == "%/05/%";
        }
        else if ($request2-> mois == "Juin" || "juin"){
            $month == "%/06/%";
        }
        else if ($request2-> mois == "Juillet" || "juillet"){
            $month == "%/07/%";
        }

        $result = DB::table('commandes')
                      ->select(DB::raw('SUM(Quantity) as Qte'), 'InvoiceDate')
                      ->where('Description', '=', $request2->produit)
                      ->where('InvoiceDate', $month)
                      ->groupBy('InvoiceDate')
                      ->get();

        //dd($result);

        return $this->chart->areaChart()
            ->setTitle('Statistiques par mois')
            ->setSubtitle('TarzanBI Database')
            ->addData($request2->produit, [50, 20, 30, 100, 5, 40, 15])
            ->setXAxis(['Janvier', 'Février', 'Mars', 'Avril','Mai', 'Juin', 'Juillet'])
            // ->setXAxis(['Janvier', 'Février', 'Mars', 'Avril','Mai', 'Juin', 'Juillet'])
            ->setMarkers(['#ffc63b'])
            ->setGrid();
    }


}
