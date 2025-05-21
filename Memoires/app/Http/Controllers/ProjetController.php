<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\User;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    public function affecterChef(Request $request, $id)
{
    $request->validate([
        'chef_projet_id' => 'required|exists:users,id'
    ]);

    $user = User::findOrFail($request->chef_projet_id);
    if ($user->role->libRole !== 'ChefProjet') {
        return redirect()->back()->with('error', 'L\'utilisateur sélectionné n\'est pas un chef de projet.');
    }

    $projet = Projet::findOrFail($id);
    $projet->chef_projet_id = $request->chef_projet_id;
    $projet->save();

    return redirect()->back()->with('success', 'Chef de projet affecté avec succès.');
}

    public function projetsParChef($id)
{
    // On récupère tous les projets affectés à ce chef
    $projets = Projet::where('chef_projet_id', $id)->get();

    // On peut aussi récupérer les infos du chef (facultatif)
    $chef = User::find($id);

    return view('chefProjet.mes_projets', compact('projets', 'chef'));
}


}
