<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = [
        'libCat',
        'desCat',
    ];

    public function etapes()
        {
            return $this->hasMany(Etape::class);
        }

}
