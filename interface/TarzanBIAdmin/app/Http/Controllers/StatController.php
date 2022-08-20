<?php

namespace App\Http\Controllers;

use App\Charts\StatsChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatController extends Controller
{
    public function stats(REQUEST $request, StatsChart $statsChart)
    {
        $data = Http::post('http://127.0.0.1:5000/stats', [
            'produit' => $request->produit,
            'mois' =>$request->mois
        ]);
        return view('layouts.stats', ['chart' => $statsChart->build($request)]);
    }
}
