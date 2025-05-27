<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Etape;
use App\Models\Projet;
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



}
