@extends('layouts.master')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">📝 Détails de l'Utilisateur</h2>
        <a href="{{ route('list_user') }}" class="btn btn-secondary">
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

            <!-- Informations utilisateur -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nom</label>
                    <input type="text" class="form-control" value="{{ $users->nom }}" readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Prénom</label>
                    <input type="text" class="form-control" value="{{ $users->prenom }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" value="{{ $users->email }}" readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Téléphone</label>
                    <input type="text" class="form-control" value="{{ $users->telephone }}" readonly>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Statut</label>
                    <input type="text" class="form-control" value="{{ $users->statut }}" readonly>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Rôle</label>
                    <input type="text" class="form-control" value="{{ $users->role->libRole }}" readonly>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Mot de passe (hashé)</label>
                <input type="password" class="form-control" value="{{ $users->password }}" readonly>
            </div>

        </div>
    </div>
</div>

@endsection
