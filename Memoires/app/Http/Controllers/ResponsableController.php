<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    public function add()
        {
            return view('responsable.projets.add');            
        }
}
