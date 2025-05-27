@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📅 Ajouter une réunion</h3>
        <a href="{{route('reunions_list')}}">
            <button type="submit" class="btn btn-primary rounded-2">🔙 Retour a la liste</button>
        </a>
    </div>
    <div >
        @include('alerte.alerte')
    </div>
    <form action="{{ route('reunions.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="ordreJour" class="form-label">Ordre du jour</label>
            <input type="text" name="odreJour" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="compteRendu" class="form-label">Compte-rendu</label>
            <textarea name="compteRendu" class="form-control" rows="4" required></textarea>
        </div>

        <div class="mb-3">
            <label for="dateReunion" class="form-label">Date de la réunion</label>
            <input type="date" name="dateReunion" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="heure" class="form-label">Heure</label>
            <input type="time" name="heure" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="lieu" class="form-label">Lieu</label>
            <input type="text" name="lieu" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="projet_id" class="form-label">Projet lié</label>
            <select name="projet_id" class="form-control" required>
                <option value="">-- Sélectionner un projet --</option>
                @foreach($projets as $projet)
                    <option value="{{ $projet->id }}">{{ $projet->libProj }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection
