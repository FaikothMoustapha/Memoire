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
    
    // Relation vers Typedoc
    public function type()
    {
        return $this->belongsTo(Typedoc::class, 'type_id');
    }

    // Relation vers Projet
    public function projet()
    {
        return $this->belongsTo(Projet::class, 'projet_id');
    }


}
