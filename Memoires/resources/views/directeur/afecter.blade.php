@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">📝 Affectation d'un projet</h2>
        <a href="{{ route('list_projet_n_affect') }}" class="btn btn-secondary">🔙 Retour à la liste</a>
    </div>

    <div class="card shadow rounded-2">
        <div class="card-body p-5">

            {{-- Alertes --}}
            @include('alerte.alerte')

            {{-- Formulaire d'affectation --}}
            <form action="{{ route('update_projet_n_affect', $projets->id) }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Code du projet</label>
                        <input type="text" class="form-control" name="code" value="{{ $projets->code }}" required>
                        <small class="text-danger">{{ $errors->first('code') }}</small>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Libellé</label>
                        <input type="text" class="form-control" name="libProj" value="{{ $projets->libProj }}" required>
                        <small class="text-danger">{{ $errors->first('libProj') }}</small>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Objectifs</label>
                    <textarea class="form-control" name="objectifs" rows="3" required>{{ $projets->objectifs }}</textarea>
                    <small class="text-danger">{{ $errors->first('objectifs') }}</small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Affecter à</label>
                    <select name="affectation_id" class="form-select" required>
                        <option value="">-- Sélectionner un utilisateur --</option>

                        <optgroup label="Chefs de projet">
                            @foreach ($chefs as $chef)
                                <option value="chef_{{ $chef->id }}">
                                    {{ $chef->nom }} {{ $chef->prenom }} (Chef de projet)
                                </option>
                            @endforeach
                        </optgroup>

                        <optgroup label="Responsables">
                            @foreach ($responsables as $responsable)
                                <option value="resp_{{ $responsable->id }}">
                                    {{ $responsable->nom }} {{ $responsable->prenom }} (Responsable)
                                </option>
                            @endforeach
                        </optgroup>
                    </select>
                    <small class="text-danger">{{ $errors->first('affectation_id') }}</small>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary rounded-2">
                        <i class="fas fa-user-plus"></i> Affecter
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
