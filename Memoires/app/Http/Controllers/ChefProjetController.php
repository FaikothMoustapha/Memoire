<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Etape;
use Illuminate\Http\Request;

class ChefProjetController extends Controller
{
    public function add()
        {
            $etapes=Etape::all();
            $activites=Activite::all();
            return view('chefProjet.activite.add')->with(compact('etapes','activites'));
}

public function list()
{
    $etapes=Etape::all();
    $activites=Activite::all();
    return view('chefProjet.activite.list')->with(compact('etapes','activites'));
}


}
