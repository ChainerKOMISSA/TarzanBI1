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
        //adresse IP du pc sur lequel le srveur est lance
        $response = Http::post('http://192.168.43.4:5000/', [
            'produit' =>$request->produit,
            'ville' =>$request->ville
        ]);
        return view('layouts.resultats',["data"=>$request],['chart' => $chart->build($request)]);
    }


}
