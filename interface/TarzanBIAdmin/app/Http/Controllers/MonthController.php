<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonthController extends Controller
{
    public function month()
    {
        return view('layouts.monthstats');
    }
}
