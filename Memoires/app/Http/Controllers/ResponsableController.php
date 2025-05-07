<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Financement;
use App\Models\Prestataire;
use App\Models\Programme;
use App\Models\Projet;
use App\Models\StatutProjet;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function list()
        {
            $projets=Projet::all();
            return view('responsable.projets.list')->with(compact('projets'));
        }
    public function add()
        {
            $categories=Categorie::all();
            $prestataires=Prestataire::all();
            $programmes=Programme::all();
            $structures=Structure::all();
            $financements=Financement::all();
            // $statuts=StatutProjet::all();
            $users=User::all();
            return view('responsable.projets.add')->with(compact('categories','prestataires','programmes','structures','financements','users'));            
        }

    public function store(Request $request)
        {
            //  dd($request->all());
            $request->validate([
                'code' => 'required|string|min:3',
                'libProj' => 'required|string|min:3',
               'objectifs' =>'required|string|min:10',
               'resAttendu' => 'required|string|min:10',
               
            ]);
           
            $projets=new Projet;
            $projets->code=$request->code;
            $projets->libProj=$request->libProj;
            $projets->objectifs=$request->objectifs;
            $projets->resAttendu=$request->resAttendu;
            $projets->categorie_id=$request->categorie_id;
            $projets->prestataire_id=$request->prestataire_id;
            $projets->programme_id=$request->programme_id; 
            $projets->structure_initiatrice_id=$request->structure_initiatrice_id;           
            $projets->structure_beneficiaire_id=$request->structure_beneficiaire_id;           
            $projets->financement_id=$request->financement_id;           
            $projets->PTF=$request->PTF;           
            $projets->statuts_projet_id=$request->statuts_projet_id;           
            $projets->chef_projet_id=$request->chef_projet_id;           
            $projets->save();            
            return redirect()->back()->with('success', 'Projet ajouter avec succès');      
        }

        
}
