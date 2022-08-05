<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class UserController extends Controller
{
    public function habits(){
        
        $client = Client::all();
        return view ('layouts.user');
    }
}
