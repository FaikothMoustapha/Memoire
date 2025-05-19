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

class DirecteurController extends Controller
{
    public function list()
    {
        // On récupère uniquement les projets sans chef de projet affecté
        $projets = Projet::whereNull('chef_projet_id')->get();

        return view('directeur.list')->with(compact('projets'));
    }

    public function update(Request $request,$id)
        {
            // $request->validate([
            //     'nom' => 'required|string|min:3',
            //     'prenom' => 'required|string|min:3',
            //     'telephone' => 'required|string|min:10',
            //     'password' => 'required|string|min:4',
            // ]);
            $projets=Projet::findOrFail($id);
        //    dd($request->id);
            $projets->code=$request->code;
            $projets->libProj=$request->libProj;
            $projets->objectifs=$request->objectifs;           
            $projets->chef_projet_id=$request->chef_projet_id;       
            $projets->save();
           return redirect()->route('list_projet_n_affect')->with('success', 'Projet affecter avec succès');  
        }

        public function affecter($id)
        {
            // c'est pour recuper les
            // dd($id);
            $categories = Categorie::all();
            $prestataires = Prestataire::all();
            $programmes = Programme::all();
            $financements = Financement::all();
            $statuts = StatutProjet::all();
            $users = User::all();
            $structures = Structure::all();
            $projets=Projet::findOrFail($id);
            
            // dd($roles);
            return view('directeur.afecter')-> with(compact('categories', 'prestataires', 'programmes','statuts','financements', 'users', 'structures','projets'));
            
        }

}
