<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Commandes extends Model
{
    use HasFactory;
    protected $table = 'commandes';
    protected $primaryKey = '_id';
    protected $connection = 'mysql2';
    protected $attributes = [
        'delayed' => false,
    ];
    
    public function clients()
    {
        return $this->belongsTo(Client::class, 'customerid');
    }
}
