@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4 text-center" >
        Étapes de la catégorie 
        <span class="badge bg-primary">{{ $projet->categorie->libelle }}</span>
        pour le projet 
        <span class="badge bg-success">{{ $projet->libProj }}</span>

        <div class="mt-5 text-center">
            <a href="{{ route('projets_parchef', ['id' => Auth::user()->id]) }}" class="btn btn-outline-secondary">
                ← Retour à mes projets
            </a>
        </div>
    </h3>

    @if($etapes->isNotEmpty())
        <div class="row g-4">
            @foreach($etapes as $etape)
                <div class="col-md-6">
                    <div class="card h-100 shadow-sm border-primary">
                        <div class="card-header bg-primary text-white fw-bold">
                            {{ $etape->libEtape }}
                        </div>
                        <div class="card-body">
                            
                            @if($etape->activites->isNotEmpty())
                                <h6 class="mt-3">Activités :</h6>
                                <ul class="list-group list-group-flush rounded">
                                    @foreach($etape->activites as $activite)
                                        <li class="list-group-item">
                                            <strong>{{ $activite->libAct }}</strong><br>
                                            <small class="text-muted">{{ $activite->description }}</small>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <div class="alert alert-info mt-3 mb-0" role="alert">
                                    Aucune activité définie pour cette étape.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center" role="alert">
            Aucune étape définie pour cette catégorie.
        </div>
    @endif

    
</div>
@endsection
