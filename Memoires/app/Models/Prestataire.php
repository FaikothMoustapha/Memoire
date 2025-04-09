<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    protected $fillable = [
        'code',
        'nomStructure',
        'nomResponsable',
        'email',
        'telephone',
    ];
}
