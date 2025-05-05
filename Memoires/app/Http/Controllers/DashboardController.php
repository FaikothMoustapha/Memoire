<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            return view('directeur/dashboard');
        }
        else if (Auth::user()->role->libRole == 'ChefProjet') 
        {
            return view('chefProjet/dashboard');
        }
    }
}
