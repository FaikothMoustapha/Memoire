@extends('layouts.master')
@section('content')

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="text-primary">📝 Enregistrement d’un Utilisateur</h2>
        <a href="{{ route('list_user') }}" class="btn btn-secondary">
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
            <form action="{{ route('store_user') }}" method="POST">
                @csrf 

                <!-- Champ Nom -->
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control rounded-2" name="nom" id="nom" required>
                    <div style="color: red">{{ $errors->first('nom') }}</div>
                </div>

                <!-- Champ Prénom et Email -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom</label>
                        <input type="text" class="form-control rounded-2" name="prenom" id="prenom" required>
                        <div style="color: red">{{ $errors->first('prenom') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control rounded-2" name="email" id="email" required>
                        <div style="color: red">{{ $errors->first('email') }}</div>
                    </div>
                </div>

                <!-- Champ Téléphone et Mot de Passe -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="telephone" class="form-label">Téléphone</label>
                        <input type="number" class="form-control rounded-2" name="telephone" id="telephone" required>
                        <div style="color: red">{{ $errors->first('telephone') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control rounded-2" name="password" id="password" required>
                    </div>
                </div>

                <!-- Sélection Statut et Rôle -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="statut" class="form-label">Statut</label>
                        <select class="form-control rounded-2 choices-select" name="statut" id="statut">
                            <option value="Actif">Actif</option>
                            <option value="Inactif">Inactif</option>
                        </select>    
                    </div>
                    <div class="col-md-6">
                        <label for="role_id" class="form-label">Rôle</label>
                        <select class="form-control rounded-2 choices-select" name="role_id" id="role_id">
                            @foreach ($roles as $Role)       
                                <option value="{{ $Role->id }}">{{ $Role->libRole }}</option>                            
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Bouton d'enregistrement -->
                <div class="mb-4 text-center text-primary">
                    <button type="submit" class="btn btn-primary rounded-2">
                        💾 Enregistrer l'utilisateur
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
