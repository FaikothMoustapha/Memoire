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
use App\Notifications\ProjetAffecteNotification;

class DirecteurController extends Controller
{
    // Liste des projets non encore affectés
    public function list()
    {
        $projets = Projet::whereNull('chef_projet_id')->whereNull('responsable_id')->get();
        return view('directeur.list')->with(compact('projets'));
    }

    // Formulaire d'affectation
    public function affecter($id)
    {
        $chefs = User::whereHas('role', fn($q) => $q->where('libRole', 'ChefProjet'))->get();
        $responsables = User::whereHas('role', fn($q) => $q->where('libRole', 'Responsable'))->get();

        $categories = Categorie::all();
        $prestataires = Prestataire::all();
        $programmes = Programme::all();
        $financements = Financement::all();
        $statuts = StatutProjet::all();
        $structures = Structure::all();
        $projets = Projet::findOrFail($id);

        return view('directeur.afecter')->with(compact(
            'categories', 'prestataires', 'programmes', 'statuts',
            'financements', 'structures', 'projets', 'chefs', 'responsables'
        ));
    }

    // Traitement du formulaire d'affectation
    public function update(Request $request, $id)
    {
        $request->validate([
            'code' => 'required|string|min:3',
            'libProj' => 'required|string|min:3',
            'objectifs' => 'required|string|min:10',
            'affectation_id' => 'required|string'
        ]);

        $value = $request->affectation_id;
        $chefId = null;
        $responsableId = null;

        // Identifier le type de rôle selon le préfixe
        if (str_starts_with($value, 'chef_')) {
            $chefId = str_replace('chef_', '', $value);
        } elseif (str_starts_with($value, 'resp_')) {
            $responsableId = str_replace('resp_', '', $value);
        }

        $projet = Projet::findOrFail($id);
        $projet->code = $request->code;
        $projet->libProj = $request->libProj;
        $projet->objectifs = $request->objectifs;
        $projet->chef_projet_id = $chefId;
        $projet->responsable_id = $responsableId;
        $projet->save();

        // Envoyer les notifications
        if ($chefId) {
            $chef = User::find($chefId);
            if ($chef) $chef->notify(new ProjetAffecteNotification($projet));
        }

        if ($responsableId) {
            $responsable = User::find($responsableId);
            if ($responsable) $responsable->notify(new ProjetAffecteNotification($projet));
        }

        return redirect()->route('list_projet_n_affect')->with('success', 'Projet affecté avec succès');
    }
}
