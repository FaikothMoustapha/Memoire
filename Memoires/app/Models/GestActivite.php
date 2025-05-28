<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GestActivite extends Model
{
    protected $fillable = [
        'dateDeb',
        'dateFAct',
        'statut',
        'activite_id',
        'projet_id',
        
    ];

}
