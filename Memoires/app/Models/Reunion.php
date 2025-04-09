<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    protected $fillable = [
        'odreJour',
        'compteRendu',
        'dateReunion',
        'heure',
        'lieu',
        'projet_id',
    ];
}
