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
        'responsable_id'
    ];
    public function categorie()
        {
            return $this->belongsTo(Categorie::class,);
        }

    public function prestataire()
        {
            return $this->belongsTo(Prestataire::class,'prestataire_id');
        }

    public function programme()
        {
            return $this->belongsTo(Programme::class,'programme_id');
        }

    public function structure()
        {
            return $this->belongsTo(Structure::class,'structure_initiatrice_id');
        }

    public function structures()
        {
            return $this->belongsTo(Structure::class,'structure_beneficiaire_id');
        }

    public function financement()
        {
            return $this->belongsTo(Financement::class,'financement_id');
        }

    public function statut()
        {
            return $this->belongsTo(StatutProjet::class,'statuts_projet_id');
        }

    public function chef_projet()
        {
            return $this->belongsTo(User::class,'chef_projet_id');
        }

    public function responsable()
        {
            return $this->belongsTo(User::class, 'responsable_id');
        }


}
