<?php

namespace App\Http\Controllers;

use App\Charts\ProductChart;
use Illuminate\Http\Request;

class PredictProdController extends Controller
{
    
    public function predictprod(ProductChart $chart, REQUEST $request)
    {
        //return view('layouts.predictprod', ['chart' => $chart->build($request)]);

        return view('layouts.predictprod', ['chart' => $chart->build()]);
    }
}
