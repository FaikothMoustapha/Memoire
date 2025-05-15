<?php

namespace App\Http\Controllers;

use App\Models\Prestataire;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    public function list()
        {
            $prestataires=Prestataire::all();
            return view('admin.prestataire.list')->with(compact('prestataires'));
        }

    public function add()
        {
            $prestataires=Prestataire::all();
            return view('admin.prestataire.add')->with(compact('prestataires'));
        }

    public function store(Request $request)
        {
            $request->validate([
                'code' => 'required|unique:prestataires',
                'nomStructure' => 'required|unique:prestataires',
                'nomResponsable' => 'required',
                'email' => 'required|email|unique:prestataires',
                'telephone' => 'required'
            ]);

            
            Prestataire::create($request->all());

            return redirect()->back()->with('success', 'Prestataire enregistré avec succès.');
        }

        public function edit($id)
        {
            // c'est pour recuper les
            // dd($id);
            
            $prestataires=Prestataire::findOrFail($id);
            
            // dd($roles);
            return view('admin.prestataire.edit')->with(compact('prestataires'));
        }
    
        public function update(Request $request,$id)
        {
            // $request->validate([
            //     'nom' => 'required|string|min:3',
            //     'prenom' => 'required|string|min:3',
            //     'telephone' => 'required|string|min:10',
            //     'password' => 'required|string|min:4',
            // ]);
            $prestataires=Prestataire::findOrFail($id);
        //    dd($request->id);
        $prestataires->code=$request->code;
        $prestataires->nomStructure=$request->nomStructure;
        $prestataires->nomResponsable=$request->nomResponsable;
        $prestataires->email=$request->email;
        $prestataires->telephone=$request->telephone;           
        $prestataires->save();
           return redirect()->route('list_prestataire')->with('success', 'Prestataire modifier avec succès');  
        }

        public function delete($id)
       {
           // Trouver le stagiaire par son ID
          
           $prestataires = Prestataire::findOrFail($id);
           
           if ($prestataires) {
               // Supprimer l'activité
               $prestataires->delete();
               return redirect()->route('list_prestataire')->with('success', 'Prestataire supprimer avec succes'); 
           }
       }
    

}
