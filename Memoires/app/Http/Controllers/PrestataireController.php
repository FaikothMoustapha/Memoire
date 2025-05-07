<?php

namespace App\Http\Controllers;

use App\Models\Prestataire;
use Illuminate\Http\Request;

class PrestataireController extends Controller
{
    public function list()
        {
            $prestataires=Prestataire::all();
            return view('admin.prestataires.list')->with(compact('prestataires'));
        }

    public function add()
        {
            $prestataires=Prestataire::all();
            return view('admin.prestataires.add')->with(compact('prestataires'));
        }

    public function store(Request $request)
        {
            $request->validate([
                'code' => 'required|unique:prestataires',
                'nomStructure' => 'required|unique:prestataires',
                'nomResponsable' => 'required',
                'email' => 'required|email|unique:prestataires',
                'telephone' => 'required'
            ]);

            Prestataire::create($request->all());

            return redirect()->back()->with('success', 'Prestataire enregistré avec succès.');
        }

}
