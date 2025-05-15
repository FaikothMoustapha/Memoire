@extends('layouts.master')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">📝 Modification d’une Activitée</h2>
        <a href="{{ route('list_activite') }}" class="btn btn-secondary">
            🔙 Retour à la liste
        </a>
    </div>

    <div class="card shadow rounded-2">
        <div class="card-body p-5">

            <!-- Notification de succès -->
            <div>
                @include('alerte.alerte')
            </div>

            <!-- Formulaire d'enregistrement -->
            <form action="{{ route('update_activite', $activites->id) }}" method="POST">
                @csrf 

                <div class="">
                    <label for="nom" class="form-label">Libelle</label>
                    <input type="text" class="form-control" name="libAct" value="{{ $activites->libAct }}" required>
                    <small class="text-danger">{{ $errors->first('libAct') }}</small>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="" class="form-label">Date prevu pour commencer</label>
                        <input type="date" class="form-control" name="datePrev" value="{{ $activites->datePrev }}" >
                        <small class="text-danger">{{ $errors->first('datePrev') }}</small>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Date prevu pour la fin</label>
                        <input type="date" class="form-control" name="dateFinAct" value="{{ $activites->dateFinAct }}" >
                        <small class="text-danger">{{ $errors->first('dateFinAct') }}</small>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label for="statut" class="form-label">Statut</label>
                        <select class="form-select" name="statut" required>
                            <option value="Début" {{ $activites->statut == 'Début' ? 'selected' : '' }}>Début</option>
                            <option value="Terminer" {{ $activites->statut == 'Terminer' ? 'selected' : '' }}>Terminer</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="etape_id" class="form-label">Etape associer</label>
                        <select class="form-select" name="etape_id" required>
                            @foreach ($etapes as $etape)
                                <option value="{{ $etape->id }}" {{ $activites->etape_id == $etape->id ? 'selected' : '' }}>
                                    {{ $etape->libEtape }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Bouton d'enregistrement -->
                <div class="mb-4 text-center text-primary">
                    <button type="submit" class="btn btn-primary rounded-2">
                        💾 Modifier
                    </button>
                </div>  
            </form>
        </div>
    </div>
</div>

{{-- Script Choices.js --}}
<script>
    document.querySelectorAll('.choices-select').forEach(function(select) {
        new Choices(select, {
            placeholder: true,
            itemSelectText: '',
            placeholderValue: 'Faites un choix',
            noResultsText: 'Aucun résultat trouvé',
            noChoicesText: 'Aucun choix à sélectionner',
            itemSelectText: 'Appuyez pour sélectionner',
        });
    });
</script>

@endsection


