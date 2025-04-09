<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'nomDoc',
        'chemin',
        'type_id',
        'projet_id',
    ];
}
