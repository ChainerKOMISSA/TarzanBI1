<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommandeController extends Controller
{
    public function cmdachats()
    {
        $commandes = DB::table('commandes')->get();
        
    } 
}
