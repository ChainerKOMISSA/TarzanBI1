<?php

namespace App\Http\Controllers;

use App\Charts\Cmd2Chart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\CmdChart;
class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(CmdChart $chart)
    {
        $countprod = DB::table('produits')->count();
        $countcmd = DB::table('commandes')->count();
        $countuser = DB::table('clients')->count();
        return view('home', compact('countuser', 'countprod', 'countcmd'), ['chart' => $chart->build()]);
    }
}
