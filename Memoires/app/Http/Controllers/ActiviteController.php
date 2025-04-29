<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    public function addactivite()
        {
            // $activites=Activite::all();
            return view('chefProjet.activite.list');
        }
}
