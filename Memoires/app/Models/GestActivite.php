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
        'etape_id', 
    ];

    public function activite()
    {
        return $this->belongsTo(Activite::class);
    }

    public function projet()
    {
        return $this->belongsTo(Projet::class);
    }

    public function etape()
    {
        return $this->belongsTo(Etape::class);
    }
}

