<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Categorie;
use App\Models\Etape;
use App\Models\Financement;
use App\Models\Prestataire;
use App\Models\Programme;
use App\Models\Projet;
use App\Models\StatutProjet;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Http\Request;

class ChefProjetController extends Controller
{

    public function projetsParChef($id)
        {
            // On récupère tous les projets affectés à ce chef
            $projets = Projet::where('chef_projet_id', $id)->get();

            // On peut aussi récupérer les infos du chef (facultatif)
            $chef = User::find($id);

            return view('chefProjet.mes_projets', compact('projets', 'chef'));
        }
    public function etapeProj($id)
        {
            // c'est pour recuper les
            // dd($id);
            $categories=Categorie::findOrFail($id);
            $etapes=Etape::all();
            
            // dd($roles);
            return view('chefProjet.projet.etape')->with(compact('categories','etapes'));
        }
        public function actProj(Request $request)
        {
            // c'est pour recuper les
            // dd($id);
            $statuts = StatutProjet::all();
            $etapes=Etape::all();
            $activites=Activite::all();
            // dd($roles);
            return view('chefProjet.projet.act')->with(compact('etapes','activites','statuts'));
        }

        public function showp($id)
        {
         //  dd($id);
          $categories = Categorie::all();
          $prestataires = Prestataire::all();
          $programmes = Programme::all();
          $financements = Financement::all();
          $statuts = StatutProjet::all();
          $users = User::all();
          $structures = Structure::all();
          $projets=Projet::findOrFail($id);
          
          // dd($stagiaires);
          return view('chefProjet.projet.show')-> with(compact('categories', 'prestataires', 'programmes','statuts','financements', 'users', 'structures','projets'));
      
        }
        public function addd($id)
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
            return view('chefProjet.projet.add')-> with(compact('categories', 'prestataires', 'programmes','statuts','financements', 'users', 'structures','projets'));
            
        }
    
        public function updat(Request $request,$id)
        {
            //  $request->validate([
            //     'code' => 'required|string|min:3',
            //     'libProj' => 'required|string|min:3',
            //     'objectifs' =>'required|string|min:10',
            //     'resAttendu' => 'required|string|min:10',
            //  ]);
            $projets=Projet::findOrFail($id);
        //    dd($request->id);
            $projets->dateDebut=$request->dateDebut;
            $projets->dateFin=$request->dateFin;
            $projets->duree=$request->duree;
            $projets->statuts_projet_id=$request->statuts_projet_id;      
            $projets->save(); 
            return redirect()->route('chefProjet_dashboard')->with('success', 'Projet modifier avec succès');  
        }
        public function getEtapes(Projet $projet)
        {
            $etapes = $projet->categorie->etapes;
            return view('chefProjet.projet.etape')-> with(compact('projet', 'etapes'));
        }
    }

