<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Projet;
use App\Models\Typedoc;

class DocumentController extends Controller
{

public function add()
{
    $types = Typedoc::all();
    $projets = Projet::all();
    $documents = Document::all();

    return view('chefProjet.document.add', compact('types', 'projets'));
}

public function store(Request $request)
    {
        $request->validate([
            'nomDoc' => 'required|string|max:255',
            'chemin' => 'required|file',
            'type_id' => 'required|exists:typedocs,id',
            'projet_id' => 'required|exists:projets,id',
        ]);

        $filePath = $request->file('chemin')->store('documents', 'public');

        Document::create([
            'nomDoc' => $request->nomDoc,
            'chemin' => $filePath,
            'type_id' => $request->type_id,
            'projet_id' => $request->projet_id,
        ]);

        return redirect()->route('documents_add')->with('success', 'Document ajouté avec succès.');
    }

public function list()
    {
        $documents = Document::with(['type', 'projet'])->get();
        return view('chefProjet.document.list', compact('documents'));
    }


}
