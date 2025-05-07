@extends('layouts.master')
@section('content')

<div class="container py-4"> 
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📋 Liste des Prestataires</h3>
        <button class="btn btn-primary rounded-2">
            ➕ Ajouter 
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
                        <th>Nom de la structure</th>
                        <th>Nom du responsable</th>
                        <th>Email</th>
                        <th>Telephone</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($prestataires as $prestataire)
                        <tr>
                            <td>{{ $prestataire->code }}</td>
                            <td>{{ $prestataire->nomStructure }}</td>
                            <td>{{ $prestataire->nomResponsable }}</td>
                            <td>{{ $prestataire->email }}</td>
                            <td>{{ $prestataire->telephone }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                        <ul>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="">
                                                    <i class="fas fa-edit text-success me-2"></i> Modifier
                                                </a>
                                            </li>
                                            <li>
                                                <form action="" method="POST" onsubmit="return confirmDelete();">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                                                        <i class="fas fa-trash-alt me-2"></i> Supprimer
                                                    </button>
                                                </form>                                                                    
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Bootstrap 5 JS (pour dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection