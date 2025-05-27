<?php

namespace App\Http\Controllers;

use App\Models\Reunion;
use App\Models\Projet;
use Illuminate\Http\Request;

class ReunionController extends Controller
{
    public function list()
    {
        $reunions = Reunion::with('projet')->latest()->get();
        return view('chefProjet.reunion.list', compact('reunions'));
    }

    public function create()
    {
        $projets = Projet::all();
        return view('chefProjet.reunion.add', compact('projets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'odreJour' => 'required|string',
            'compteRendu' => 'required|string',
            'dateReunion' => 'required|date',
            'heure' => 'required',
            'lieu' => 'required|string',
            'projet_id' => 'required|exists:projets,id',
        ]);

        Reunion::create($request->all());

        return redirect()->route('reunions.create')->with('success', 'Réunion ajoutée avec succès.');
    }

}
