<?php

namespace App\Http\Controllers;

use App\Charts\ResultChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Product;

class ResultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function result(REQUEST $request, ResultChart $chart)
    {
        $response = Http::post('http://127.0.0.1:5000/', [
            'produit' =>$request->produit,
            'ville' =>$request->ville
        ]);
        return view('layouts.resultats',["data"=>$request],['chart' => $chart->build()]);
    }

    
}