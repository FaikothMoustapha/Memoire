<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Etape;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function add()
        {
            $etapes=Etape::all();
            $activites=Activite::all();
            return view('chefProjet.activite.add')->with(compact('etapes','activites'));
        }
    
    public function store(Request $request)
            {
                // $request->validate([
                //     'code' => 'required|unique:prestataires',
                //     'nomStructure' => 'required|unique:prestataires',
                //     'nomResponsable' => 'required',
                //     'email' => 'required|email|unique:prestataires',
                //     'telephone' => 'required'
                // ]);
                $activites=new Activite();
                $activites->libAct=$request->libAct;
                $activites->datePrev=$request->datePrev;
                $activites->dateFinAct=$request->dateFinAct;
                $activites->statut=$request->statut;
                $activites->etape_id=$request->etape_id;           
                $activites->save();
                return redirect()->back()->with('success', 'activite ajouter avec succès');  
                
            }
    
    
    public function list()
    {
        $etapes=Etape::all();
        $activites=Activite::all();
        return view('chefProjet.activite.list')->with(compact('etapes','activites'));
    }
    
    public function edit($id)
        {
            // c'est pour recuper les
            // dd($id);
            
            $etapes=Etape::all();
            $activites=Activite::findOrFail($id);
            
            // dd($roles);
            return view('chefProjet.activite.edit')->with(compact('etapes','activites'));
        }
    
        public function update(Request $request,$id)
        {
            // $request->validate([
            //     'nom' => 'required|string|min:3',
            //     'prenom' => 'required|string|min:3',
            //     'telephone' => 'required|string|min:10',
            //     'password' => 'required|string|min:4',
            // ]);
            $activites=Activite::findOrFail($id);
        //    dd($request->id);
            $activites->libAct=$request->libAct;
            $activites->datePrev=$request->datePrev;
            $activites->dateFinAct=$request->dateFinAct;
            $activites->statut=$request->statut;
            $activites->etape_id=$request->etape_id;           
            $activites->save();
           return redirect()->route('list_activite')->with('success', 'Activite modifier avec succès');  
        }
    
        public function delete($id)
       {
           // Trouver le stagiaire par son ID
          
           $etapes=Etape::all();
           $activites = Activite::findOrFail($id);
           
           if ($activites) {
               // Supprimer l'activité
               $activites->delete();
               return redirect()->route('list_activite')->with('success', 'Activité supprimer avec succes'); 
           }
       }
}
