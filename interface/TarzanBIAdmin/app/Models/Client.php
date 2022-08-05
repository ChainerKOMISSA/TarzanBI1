<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\BSON\Regex;
#use Jenssegers\Mongodb\Eloquent\Model;



class Client extends Eloquent
{
    use HasFactory;
    protected $connection = 'mongodb';
    protected $collection = 'Clients';
    protected $fillable = [
        'nom', 'prenoms', 'phone_number'
    ];

}