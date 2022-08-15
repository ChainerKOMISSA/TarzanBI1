<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Commandes;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CommandeController as Cmd;

class UserController extends Controller
{
    public function habits(){
        // $clients = Client::get();
        // foreach (Client::all() as $key){
        //     $clientsid = $key->id;
        //     $achats = DB::table('commandes')
        //             ->join('clients', 'commandes.customerid', '=', 'clients.id')
        //             ->select('commandes.description')
        //             ->distinct()
        //             ->get();

        //     $villes = DB::table('commandes')
        //             ->join('clients', 'commandes.customerid', '=', 'clients.id')
        //             ->select('commandes.city')
        //             ->distinct()
        //             ->get();
        // }
        //return view('layouts.user', compact('clients', 'achats', 'villes'));
        // foreach (Client::all() as $value) {
        //     dd($value->commandes);
        //     foreach ($value->commandes->unique('Description')->pluck('Description') as $commande) {
        //         dump($commande);
        //     }
        // }
        // die();
        return view('layouts.user')->with(['clients' => Client::all()]);
    }

}
