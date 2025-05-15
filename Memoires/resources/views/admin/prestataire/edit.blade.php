@extends('layouts.master')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">📝 Modification d’un Prestataires</h2>
        <a href="{{ route('list_prestataire') }}" class="btn btn-secondary">
            🔙 Retour à la liste
        </a>
    </div>

    <div class="card shadow rounded-2">
        <div class="card-body p-5">

            <!-- Notification de succès -->
            <div>
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{session('success')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>

            <!-- Formulaire d'enregistrement -->
            <form action="{{ route('update_prestataire' , $prestataires->id) }}" method="POST">
                @csrf 

               
                <div class="">
                    <label for="nom" class="form-label">Code du prestataire</label>
                    <input type="text" class="form-control" name="code" value="{{ $prestataires->code }}" required>
                    <small class="text-danger">{{ $errors->first('code') }}</small>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="" class="form-label">Nom de la structure</label>
                        <input type="text" class="form-control" name="nomStructure" value="{{ $prestataires->nomStructure }}" required>
                        <small class="text-danger">{{ $errors->first('nomStructure') }}</small>
                    </div>
                    <div class="col-md-6">
                        <label for="" class="form-label">Nom du responsable</label>
                        <input type="text" class="form-control" name="nomResponsable" value="{{ $prestataires->nomResponsable }}" required>
                        <small class="text-danger">{{ $errors->first('nomResponsable') }}</small>
                    </div>
                </div>

                <!-- Champ Téléphone et email  -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ $prestataires->email }}" required>
                        <small class="text-danger">{{ $errors->first('email') }}</small>
                    </div>

                    <div class="col-md-6">
                        <label for="" class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="telephone" value="{{ $prestataires->telephone }}" required>
                        <small class="text-danger">{{ $errors->first('telephone') }}</small>
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



{{-- @extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- Header Section -->
            <div class="card-header bg-primary text-white rounded-top d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="section-title" style="font-family: Algerian;">Modification d'un prestataires</h3>
                    
                </div>
                <a href="{{ route('list_prestataire') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Retour à la liste des prestataires
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
                    <form method="post" action="{{ route('update_prestataire', $prestataires->id) }}">
                        @csrf
                        <h4 class="mb-4 text-primary">Détails de l'utilisateur</h4>

                        <div class="">
                            <label for="nom" class="form-label">Code du prestataire</label>
                            <input type="text" class="form-control" name="code" value="{{ $prestataires->code }}" required>
                            <small class="text-danger">{{ $errors->first('code') }}</small>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Nom de la structure</label>
                                <input type="text" class="form-control" name="nomStructure" value="{{ $prestataires->nomStructure }}" required>
                                <small class="text-danger">{{ $errors->first('nomStructure') }}</small>
                            </div>
                            <div class="col-md-6">
                                <label for="" class="form-label">Nom du responsable</label>
                                <input type="text" class="form-control" name="nomResponsable" value="{{ $prestataires->nomResponsable }}" required>
                                <small class="text-danger">{{ $errors->first('nomResponsable') }}</small>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="" class="form-label">Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $prestataires->email }}" required>
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>

                            <div class="col-md-6">
                                <label for="" class="form-label">Téléphone</label>
                                <input type="text" class="form-control" name="telephone" value="{{ $prestataires->telephone }}" required>
                                <small class="text-danger">{{ $errors->first('telephone') }}</small>
                            </div>
                        </div>
                        <!-- Submit Button -->
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary px-4">Modifier</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
</div>

@endsection --}}
