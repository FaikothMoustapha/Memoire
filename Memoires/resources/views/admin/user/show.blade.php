@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="container-fluid py-4">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center bg-light">
                    <div>
                        <h3 class="mb-0" style="font-family: 'Algerian', sans-serif;">Modification d'un utilisateur</h3>
                        <small class="text-muted">Veuillez modifier vos informations pour qu'on puisse vous enrégistrer.</small>
                    </div>
                    <a href="{{ route('list_user') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Retour à la liste des utilisateurs
                    </a>
                </div>
        
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
        
                <div class="card-body">
                    <form method="post" action="">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="nom" class="form-label">Nom</label>
                                <input type="text" class="form-control" name="nom" value="{{ $users->nom }}" readonly>
                                <small class="text-danger">{{ $errors->first('nom') }}</small>
                            </div>
        
                            <div class="col-md-6">
                                <label for="prenom" class="form-label">Prénom</label>
                                <input type="text" class="form-control" name="prenom" value="{{ $users->prenom }}" readonly>
                                <small class="text-danger">{{ $errors->first('prenom') }}</small>
                            </div>
        
                            <div class="col-md-12">
                                <label for="email" class="form-label">Adresse Email</label>
                                <input type="email" class="form-control" name="email" value="{{ $users->email }}" readonly>
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>
        
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Téléphone</label>
                                <input type="number" class="form-control" name="telephone" value="{{ $users->telephone }}" readonly>
                                <small class="text-danger">{{ $errors->first('telephone') }}</small>
                            </div>
        
                            <div class="col-md-6">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input type="password" class="form-control" name="password" value="{{ $users->password }}" readonly>
                                <small class="text-danger">{{ $errors->first('password') }}</small>
                            </div>
        
                            <div class="col-md-6">
                                <label for="statut" class="form-label">Statut</label>
                                <input type="text" class="form-control" name="statut" value="{{ $users->statut }}" readonly>
                            </div>
        
                            <div class="col-md-6">
                                <label for="role_id" class="form-label">Rôle</label>
                                <select class="form-select" name="role_id" disabled>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ $users->role_id == $role->id ? 'selected' : '' }}>
                                            {{ $role->libRole }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
        
                            <div class="col-12 text-center mt-4">
                                <button type="submit" class="btn btn-primary px-5">
                                    <i class="fas fa-save me-2"></i> Enregistrer
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
</div>

@endsection
