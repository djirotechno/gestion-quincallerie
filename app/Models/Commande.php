<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $fillable = [

      'name','detail','prix', 'qt','clientid','statut','idprod','qyt'

    ];

    
}
