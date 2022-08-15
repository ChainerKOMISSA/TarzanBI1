<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $primaryKey = 'id';
    protected $connection = 'mysql2';
    protected $attributes = [
        'delayed' => false, 
    ];

    public function commandes()
    {
        return $this->hasMany(Commandes::class, 'customerid');
    }
}
