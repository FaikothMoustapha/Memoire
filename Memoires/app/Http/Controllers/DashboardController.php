<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role_id == '1')
        {
            // dd('Admin');
             return view('admin/dashboard');
        }
        else if (Auth::user()->role_id == '2') 
        {
            return view('responsable/dashboard');
        }
        
    }
}
