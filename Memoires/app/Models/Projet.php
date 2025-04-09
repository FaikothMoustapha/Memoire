<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    protected $fillable = [
        'code',
        'libProj',
        'objectifs',
        'resAttendu',
        'dateDebut',
        'dateFin',
        'duree',
        'categorie_id',
        'prestataire_id' ,
        'programme_id',
        'structure_initiatrice_id',
        'structure_beneficiaire_id',
        'financement_id',
        'PTF',
        'statuts_projet_id',
        'chef_projet_id',
    ];
}
