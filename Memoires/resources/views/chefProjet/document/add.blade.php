@extends('layouts.master')
@section('content')

<div class="container">
    <h2>Ajouter un document</h2>
    <div>
        @include('alerte.alerte')
    </div>
    
    <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Nom du document -->
        <div class="mb-3">
            <label for="nomDoc" class="form-label">Nom du document</label>
            <input type="text" name="nomDoc" class="form-control" value="{{ old('nomDoc') }}" required>
        </div>

        <!-- Fichier -->
        <div class="mb-3">
            <label for="chemin" class="form-label">Fichier</label>
            <input type="file" name="chemin" class="form-control" required>
        </div>

        <!-- Type de document -->
        <div class="mb-3">
            <label for="type_id" class="form-label">Type de document</label>
            <select name="type_id" class="form-control" required>
                <option value="">-- Sélectionner un type --</option>
                @foreach($types as $type)
                    <option value="{{ $type->id }}">{{ $type->libtype }}</option>
                @endforeach
            </select>
        </div>

        <!-- Projet -->
        <div class="mb-3">
            <label for="projet_id" class="form-label">Projet</label>
            <select name="projet_id" class="form-control" required>
                <option value="">-- Sélectionner un projet --</option>
                @foreach($projets as $projet)
                    <option value="{{ $projet->id }}">{{ $projet->libProj}}</option>
                @endforeach
            </select>
        </div>

        <!-- Bouton de soumission -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>


@endsection
