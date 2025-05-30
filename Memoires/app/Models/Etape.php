<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
    protected $fillable = [
        'description',
        'libEtape',
        'categorie_id',
        
    ];
    public function activites()
    {
        return $this->hasMany(\App\Models\Activite::class);
    }
   public function gestActivites()
        {
            return $this->hasMany(GestActivite::class);
        }
 

}
