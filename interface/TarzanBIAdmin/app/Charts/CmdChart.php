<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class CmdChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\AreaChart
    {
        $month = "/07/";
        $cmd = DB::table('commandes')
                    ->select(DB::raw("COUNT(_id) as 'Nbre'"), 'InvoiceDate')
                    ->groupBy('InvoiceDate')
                    ->where('InvoiceDate', 'LIKE', '%'.$month.'%')
                    ->get();

        // $cmd = DB::table('commandes')
        //             ->select(DB::raw("COUNT(_id) as 'Nbre'"), DB::raw("MONTH(InvoiceDate) as InvoiceDate"))
        //             ->groupBy('InvoiceDate')
        //             ->get();

        //dd($cmd);
        // $mydate = $cmd[0]->InvoiceDate;

        // $date = Carbon::createFromFormat('d/m/Y', $mydate);
        // $month = $date->format('F');
        //dd($month);


        return $this->chart->areaChart()
            ->setTitle('Commandes du mois de Juillet')
            ->setSubtitle('TarzanBI Database')
            ->addData('Commandes', [$cmd[0]->Nbre, $cmd[1]->Nbre, $cmd[2]->Nbre, $cmd[3]->Nbre, $cmd[4]->Nbre, $cmd[5]->Nbre, $cmd[6]->Nbre, $cmd[7]->Nbre])
            ->setColors(['#ffc63b'])
            ->setMarkers(['#FF5722'])
            ->setXAxis([(array)$cmd[0]->InvoiceDate, (array)$cmd[1]->InvoiceDate, (array)$cmd[2]->InvoiceDate, (array)$cmd[3]->InvoiceDate, (array)$cmd[4]->InvoiceDate, (array)$cmd[5]->InvoiceDate, (array)$cmd[6]->InvoiceDate, (array)$cmd[7]->InvoiceDate])
            ->setGrid();
    }
}
