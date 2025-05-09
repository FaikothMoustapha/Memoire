@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- Header Section -->
            <div class="card-header bg-primary text-white rounded-top d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="section-title" style="font-family: Algerian;">Modification d'une Activité</h3>
                    
                </div>
                <a href="{{ route('list_activite') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste des utilisateurs
                </a>
            </div>
        
            <!-- Success Message Section -->
            <div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        
            <!-- Form Section -->
            <div class="card shadow">
                <div class="card-body p-4">
                    <form method="post" action="{{ route('update_activite', $activites->id) }}">
                        @csrf
                        <h4 class="mb-4 text-primary">Détails de l'utilisateur</h4>
        
                        <!-- Name and Surname Fields -->
                       
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

                        <!-- Statut and Etape Fields -->
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
        
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
</div>

@endsection
