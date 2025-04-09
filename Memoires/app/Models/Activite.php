<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    protected $fillable = [
        'libAct',
        'datePrev',
        'dateFinAct',
        'statut',
        'etape_id',
    ];
}
