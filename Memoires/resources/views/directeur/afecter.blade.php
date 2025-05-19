@extends('layouts.master')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">📝 Affectation dun projet</h2>
        <a href="{{ route('list_projet_n_affect') }}" class="btn btn-secondary">
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
            <form action="{{ route('update_projet_n_affect', $projets->id) }}" method="POST">
                @csrf 
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label  class="form-label">Code du projet</label>
                        <input type="text" class="form-control" name="code" value="{{ $projets->code }}" required>
                        <small class="text-danger">{{ $errors->first('code') }}</small>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Libellé</label>
                        <input type="text" class="form-control" name="libProj" value="{{ $projets->libProj }}" >
                        <small class="text-danger">{{ $errors->first('libProj') }}</small>
                    </div>
                </div>
                </div class="row mb-3">
                    <div class="col-md-6">
                        <label for="" class="form-label">Objectifs</label>
                        <input type="text" class="form-control" name="objectifs" value="{{ $projets->objectifs }}" >
                        <small class="text-danger">{{ $errors->first('objectifs') }}</small>
                    </div>
                    <div class="col-md-6">
                        <label for="etape_id" class="form-label">chef de projets</label>
                        <select class="form-select" name="chef_projet_id" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}" {{ $projets->chef_projet_id == $user->id ? 'selected' : '' }}>
                                    {{ $user->nom }} {{ $user->prenom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Bouton d'enregistrement -->
                <div class="mb-4 text-center text-primary">
                    <button type="submit" class="btn btn-primary rounded-2">
                        <i class="fas fa-user-plus"></i> Affecter
                    </button>
                </div>  
            </form>
        </div>
    </div>
</div>

@endsection


