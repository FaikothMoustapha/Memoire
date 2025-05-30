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
    public function etape()
        {
            return $this->belongsTo(Etape::class);
        }
   public function gestActivite()
{
    return $this->hasOne(GestActivite::class);
}

    public function gestActiviteForProjet($projetId)
    {
        return $this->hasOne(GestActivite::class)->where('projet_id', $projetId);
    }

}
