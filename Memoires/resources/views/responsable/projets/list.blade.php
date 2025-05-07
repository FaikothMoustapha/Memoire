@extends('layouts.master')
@section('content')

<div class="container py-4"> 
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📋 Liste des projets</h3>
        <button class="btn btn-primary rounded-2">
            ➕ Ajouter un projet
        </button>
    </div>

    <!-- Barre de recherche -->
    <div class="mb-3">
        <input type="text" class="form-control" placeholder="🔍 Rechercher un projet...">
    </div>

    <!-- Tableau -->
    <div class="card shadow rounded-2">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-primary">
                    <tr>
                        <th>Code</th>
                        <th>Libellé</th>
                        <th>Statut</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemple de ligne -->
                    <tr>
                        <td>PRJ001</td>
                        <td>Développement plateforme web</td>
                        <td>En cours</td>
                        <td>Numérique</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-eye text-primary me-2"></i>Voir</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fas fa-edit text-warning me-2"></i>Modifier</a></li>
                                    <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-trash-alt me-2"></i>Supprimer</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    <!-- Fin exemple -->
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Bootstrap 5 JS (pour dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection