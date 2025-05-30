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
                            @php
                                // Définir la classe bootstrap selon le statut
                                $classeStatut = match(optional($activite->gestActivite)->statut) {
                                    'non démarré' => 'list-group-item-secondary',
                                    'en cours' => 'list-group-item-warning',
                                    'terminé' => 'list-group-item-success',
                                    default => '',
                                };
                            @endphp
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap {{ $classeStatut }}">
                                <div>
                                    <strong class="fs-5">{{ $activite->libAct }}</strong><br>
                                    <small class="text-muted">{{ $activite->description }}</small><br>

                                    <div class="mt-2">
                                        @if($activite->gestActivite)
                                            <span class="badge bg-info me-2">
                                                Statut : {{ ucfirst($activite->gestActivite->statut) }}
                                            </span>
                                            <span class="badge bg-secondary">
                                                Dates : 
                                                Début {{ $activite->gestActivite->dateDeb ? \Carbon\Carbon::parse($activite->gestActivite->dateDeb)->format('d/m/Y') : '—' }}
                                                |
                                                Fin {{ $activite->gestActivite->dateFAct ? \Carbon\Carbon::parse($activite->gestActivite->dateFAct)->format('d/m/Y') : '—' }}
                                            </span>
                                        @else
                                            <span class="badge bg-warning me-2">Pas renseigné</span>
                                        @endif
                                    </div>
                                </div>

                                <button class="btn btn-sm btn-outline-primary mt-2 mt-md-0" data-bs-toggle="modal" data-bs-target="#modalActivite{{ $activite->id }}">
                                    Renseigner
                                </button>
                            </li>

                            <!-- Modal -->
                            <div class="modal fade" id="modalActivite{{ $activite->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $activite->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div>
                                        @include('alerte.alerte')
                                    </div>
                                    <form method="POST" action="{{ route('activite.update') }}">
                                        @csrf
                                        <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                        <input type="hidden" name="activite_id" value="{{ $activite->id }}">
                                        <input type="hidden" name="etape_id" value="{{ $etape->id }}">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel{{ $activite->id }}">
                                                    Renseigner l’activité : {{ $activite->libAct }}
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="date_debut{{ $activite->id }}" class="form-label">Date de début</label>
                                                    <input type="date" class="form-control" name="date_debut" id="date_debut{{ $activite->id }}" 
                                                        value="{{ old('date_debut', optional($activite->gestActivite)->dateDeb ? \Carbon\Carbon::parse($activite->gestActivite->dateDeb)->format('Y-m-d') : '') }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date_fin{{ $activite->id }}" class="form-label">Date de fin</label>
                                                    <input type="date" class="form-control" name="date_fin" id="date_fin{{ $activite->id }}" 
                                                        value="{{ old('date_fin', optional($activite->gestActivite)->dateFAct ? \Carbon\Carbon::parse($activite->gestActivite->dateFAct)->format('Y-m-d') : '') }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="statut{{ $activite->id }}" class="form-label">Statut</label>
                                                    <select class="form-select" name="statut" id="statut{{ $activite->id }}">
                                                        <option value="non démarré" {{ optional($activite->gestActivite)->statut == 'non démarré' ? 'selected' : '' }}>Non démarré</option>
                                                        <option value="en cours" {{ optional($activite->gestActivite)->statut == 'en cours' ? 'selected' : '' }}>En cours</option>
                                                        <option value="terminé" {{ optional($activite->gestActivite)->statut == 'terminé' ? 'selected' : '' }}>Terminé</option>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Pour chaque formulaire dans les modales
    document.querySelectorAll('form').forEach(function(form) {
        form.addEventListener('submit', function(e) {
            const submitBtn = form.querySelector('button[type="submit"]');
            if (submitBtn) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Enregistrement...
                `;
            }
        });
    });

    // Si tu as des erreurs de validation venant du backend
    // ouvrir automatiquement la modale correspondante pour corriger
    @if ($errors->any())
        @foreach ($etapes as $etape)
            @foreach ($etape->activites as $activite)
                @if ($errors->hasAny(['date_debut', 'date_fin', 'statut']) && old('activite_id') == $activite->id)
                    var modal = new bootstrap.Modal(document.getElementById('modalActivite{{ $activite->id }}'));
                    modal.show();
                @endif
            @endforeach
        @endforeach
    @endif
});
</script>