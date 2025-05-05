@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <!-- Header Section -->
            <div class="card-header bg-primary text-white rounded-top d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="section-title" style="font-family: Algerian;">Modification d'un utilisateur</h3>
                    <p>Veuillez modifier vos informations pour qu'on puisse vous enrégistrer.</p>
                </div>
                <a href="{{ route('list_user') }}" class="btn btn-secondary">
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
                    <form method="post" action="{{ route('update_user', $users->id) }}">
                        @csrf
                        <h4 class="mb-4 text-primary">Détails de l'utilisateur</h4>
        
                        <!-- Name and Surname Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" value="{{ $users->nom }}" required>
                                <small class="text-danger">{{ $errors->first('nom') }}</small>
                            </div>
        
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="prenom" value="{{ $users->prenom }}" required>
                                <small class="text-danger">{{ $errors->first('prenom') }}</small>
                            </div>
                        </div>
        
                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse Email</label>
                            <input type="email" class="form-control" name="email" value="{{ $users->email }}" placeholder="example@gmail.com" required>
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div>
        
                        <!-- Telephone and Password Fields -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="number" class="form-control" name="telephone" value="{{ $users->telephone }}" placeholder="Nombre">
                                <small class="text-danger">{{ $errors->first('telephone') }}</small>
                            </div>
        
                            <div class="col-md-6">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" value="{{ $users->password }}" required>
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
                        </div>
        
                        <!-- Statut and Role Fields -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="statut" class="form-label">Statut</label>
                                <select class="form-select" name="statut" required>
                                    <option value="actif" {{ $users->statut == 'actif' ? 'selected' : '' }}>Actif</option>
                                    <option value="inactif" {{ $users->statut == 'inactif' ? 'selected' : '' }}>Inactif</option>
                                </select>
                            </div>
        
                            <div class="col-md-6">
                                <label for="role_id" class="form-label">Rôle</label>
                                <select class="form-select" name="role_id" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $users->role_id == $role->id ? 'selected' : '' }}>
                                            {{ $role->libRole }}
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
