<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    protected $fillable = [
        'code',
        'libStruc',
        'programme_id',
    ];
}
