@php
    use Carbon\Carbon;
@endphp

@extends('layouts.master')
@section('content')
<div class="container mt-5">
    <h3 class="mb-4 text-center">
        Étapes de la catégorie 
        <span class="badge bg-primary">{{ $projet->categorie->libelle }}</span>
        pour le projet 
        <span class="badge bg-success">{{ $projet->libProj }}</span>
    </h3>

    <div class="mb-5 text-center">
        <a href="{{ route('projets_parchef', ['id' => Auth::user()->id]) }}" class="btn btn-outline-secondary">
            ← Retour à mes projets
        </a>
    </div>

    @if($etapes->isNotEmpty())
        @foreach($etapes as $etape)
            <div class="mb-5 p-4 shadow-sm rounded border">
                <h4 class="text-primary mb-3">{{ $etape->libEtape }}</h4>

                @if($etape->activites->isNotEmpty())
                    <ul class="list-group">
                        @foreach($etape->activites as $activite)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong class="fs-5">{{ $activite->libAct }}</strong><br>
                                    <small class="text-muted">{{ $activite->description }}</small><br>

                                    <div class="mt-2">
                                        @if($activite->statut)
                                            <span class="badge bg-info me-2">
                                                Statut : {{ ucfirst($activite->statut) }}
                                            </span>
                                        @endif

                                        @if($activite->datePrev || $activite->dateFinAct)
                                            <span class="badge bg-secondary">
                                                Dates : 
                                                Début {{ $activite->datePrev ? \Carbon\Carbon::parse($activite->datePrev)->format('d/m/Y') : '—' }}
                                                |
                                                Fin {{ $activite->dateFinAct ? \Carbon\Carbon::parse($activite->dateFinAct)->format('d/m/Y') : '—' }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalActivite{{ $activite->id }}">
                                    Renseigner
                                </button>
                            </li>

                            <!-- Modal -->
                            <div class="modal fade" id="modalActivite{{ $activite->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $activite->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="POST" action="{{ route('activite.update', $activite->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $activite->id }}">
                                                    Modifier l’activité : {{ $activite->libAct }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="date_debut{{ $activite->id }}" class="form-label">Date de début</label>
                                                    <input type="date" class="form-control" name="date_debut" id="date_debut{{ $activite->id }}" value="{{ $activite->date_debut }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date_fin{{ $activite->id }}" class="form-label">Date de fin</label>
                                                    <input type="date" class="form-control" name="date_fin" id="date_fin{{ $activite->id }}" value="{{ $activite->date_fin }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="statut{{ $activite->id }}" class="form-label">Statut</label>
                                                    <select class="form-select" name="statut" id="statut{{ $activite->id }}">
                                                        <option value="non démarré" {{ $activite->statut == 'non démarré' ? 'selected' : '' }}>Non démarré</option>
                                                        <option value="en cours" {{ $activite->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                                                        <option value="terminé" {{ $activite->statut == 'terminé' ? 'selected' : '' }}>Terminé</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Enregistrer</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </ul>
                @else
                    <div class="alert alert-info mt-3">
                        Aucune activité définie pour cette étape.
                    </div>
                @endif
            </div>
        @endforeach
    @else
        <div class="alert alert-warning text-center" role="alert">
            Aucune étape définie pour cette catégorie.
        </div>
    @endif
</div>
@endsection
