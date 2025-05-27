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
use Illuminate\Support\Facades\Auth;
use App\Notifications\NouveauProjetCree;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function list()
        {
            $projets=Projet::all();
            return view('responsable.projets.list')->with(compact('projets'));
        }
        
    public function add(Request $request)
        {
            $categories = Categorie::all();
            $prestataires = Prestataire::all();
            $programmes = Programme::all();
            $financements = Financement::all();
            $statuts = StatutProjet::all();
            $users = User::all();
            $structures = Structure::all();
            return view('responsable.projets.add')-> with(compact('categories', 'prestataires', 'programmes','statuts','financements', 'users', 'structures'));
        }
        public function getStructuresByProgramme($programme_id)
            {
                $structures = Structure::where('programme_id', $programme_id)->get();
                return response()->json($structures);
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
            
            $directeur = User::where('role_id', '3')->first();

            if ($directeur) {
                $directeur->notify(new NouveauProjetCree($projets));
            }
            return redirect()->back()->with('success', 'Projet ajouter avec succès');      
        }

        public function edit($id)
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
            return view('responsable.projets.edit')-> with(compact('categories', 'prestataires', 'programmes','statuts','financements', 'users', 'structures','projets'));
            
        }
    
        public function update(Request $request,$id)
        {
             $request->validate([
                'code' => 'required|string|min:3',
                'libProj' => 'required|string|min:3',
                'objectifs' =>'required|string|min:10',
                'resAttendu' => 'required|string|min:10',
             ]);
            $projets=Projet::findOrFail($id);
        //    dd($request->id);
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
           return redirect()->route('list_projet')->with('success', 'Projet modifier avec succès');  
        }
    

        public function show($id)
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
     return view('responsable.projets.show')-> with(compact('categories', 'prestataires', 'programmes','statuts','financements', 'users', 'structures','projets'));
 
   }
    //     public function delete($id)
    //    {
    //        // Trouver le stagiaire par son ID
          
    //        $etapes=Etape::all();
    //        $activites = Activite::findOrFail($id);
           
    //        if ($activites) {
    //            // Supprimer l'activité
    //            $activites->delete();
    //            return redirect()->route('list_activite')->with('success', 'Activité supprimer avec succes'); 
    //        }
    //    }
public function mesProjets()
{
    $responsable = Auth::user();
    $projets = Projet::where('responsable_id', $responsable->id)->get();

    return view('responsable.mes_projets', compact('projets', 'responsable'));
}


        }



