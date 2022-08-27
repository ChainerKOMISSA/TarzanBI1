<?php

namespace App\Http\Controllers;

use App\Charts\StatsChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatController extends Controller
{
    public function stats(REQUEST $request, StatsChart $statsChart)
    {
        //adresse IP du pc sur lequel le srveur est lance
        $data = Http::post('http://192.168.43.4:5000/stats', [
            'produit' => $request->produit,
            'mois' =>$request->mois
        ]);
        return view('layouts.stats', ['chart' => $statsChart->build($request)]);
    }
}
