<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projet;
use App\Models\Reunion;
use App\Models\StatutProjet;
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
            $chefId = Auth::user()->id;

            $statutTermineId = StatutProjet::where('libStatut', 'terminé')->value('id');
            $statutEnCoursId = StatutProjet::where('libStatut', 'en cours')->value('id');
            $statutNouveauId = StatutProjet::where('libStatut', 'nouveau')->value('id');

            $totalTermines = Projet::where('chef_projet_id', $chefId)->where('statuts_projet_id', $statutTermineId)->count();
            $totalEnCours = Projet::where('chef_projet_id', $chefId)->where('statuts_projet_id', $statutEnCoursId)->count();
            $totalNouveaux = Projet::where('chef_projet_id', $chefId)->where('statuts_projet_id', $statutNouveauId)->count();

            $totalAffectes = $totalTermines + $totalEnCours + $totalNouveaux;

            $total = $totalAffectes ?: 1;
            $pourcentageTermines = ($totalTermines / $total) * 100;
            $pourcentageEnCours = ($totalEnCours / $total) * 100;
            $pourcentageNouveaux = ($totalNouveaux / $total) * 100;
            $reunions = Reunion::all();

    // Affiche toutes les réunions pour vérifier qu'elles sont bien récupérées
            $reunions = $reunions->map(function($r) {
                $title = $r->odreJour;
                $start = $r->dateReunion . 'T' . \Carbon\Carbon::parse($r->heure)->format('H:i:s');
                
            });

            return view('chefProjet.dashboard', compact('totalAffectes','totalTermines','totalEnCours','totalNouveaux',
                'pourcentageTermines',
                'pourcentageEnCours',
                'pourcentageNouveaux',
                'reunions'
            ));
            
        }
    }
}

    


