<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Reunion;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role->libRole == "Administrateur")
        {
            // dd('Admin');
           
            return view('admin/dashboard');
        }
        else if (Auth::user()->role->libRole == 'Responsable') 
        {
            return view('responsable/dashboard');
        }
        else if (Auth::user()->role->libRole == 'Directeur') 
        {
            $abandonnes= 2;
            $termines = 12;
            $encours = 7;
            $nouveaux = 5;
            return view('directeur.dashboard', compact('termines', 'encours', 'nouveaux','abandonnes'));
            
        }
        else if (Auth::user()->role->libRole == 'ChefProjet') 
        {
            $statuts = ['Nouveau', 'En cours', 'Terminé', 'Abandonné'];
            $projets = [];
            foreach ($statuts as $s) {
            $projets[$s] = Projet::where('statuts_projet_id', $s)->count();
            }

            $reunions = Reunion::orderBy('dateReunion')->orderBy('heure')->get();
            return view('chefProjet.dashboard', compact('reunions'));

                return view('chefProjet.dashboard', compact('projets', 'reunions'));
        
        }
    }
        


}