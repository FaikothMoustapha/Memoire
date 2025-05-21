@extends('layouts.master')
@section('content')

<div class="container py-4"> 
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📋 LISTE DES PROJETS CRÉÉS</h3>
        <a href="{{ route('add_user') }}">
            <button type="submit" class="btn btn-primary rounded-2">➕ Ajouter</button>
        </a>
    </div>

    <!-- Barre de recherche -->
    <div class="mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="🔍 RECHERCHER UN PROJET...">
    </div>

    <!-- Tableau -->
    <div class="card shadow rounded-2">
        <div class="card-body p-0">
            <table class="table table-hover mb-0" id="userTable">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">CODE DU PROJET</th>
                        <th class="text-center">LIBELLÉ</th>
                        <th class="text-center">PROGRAMME</th>
                        <th class="text-center">STRUCTURE INITIATRICE</th>
                        <th class="text-center">STRUCTURE BÉNÉFICIAIRE</th>
                        <th class="text-center">CATÉGORIE</th>
                        <th class="text-center">STATUT DU PROJET</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projets as $projet)
                    <tr>
                        <td class="text-center">{{ $projet->code }}</td>
                        <td class="text-center">{{ $projet->libProj }}</td>
                        <td class="text-center">{{ $projet->programme->libProg }}</td>
                        <td class="text-center">{{ $projet->structure->libStruc }}</td>
                        <td class="text-center">{{ $projet->structures->libStruc }}</td>
                        <td class="text-center">{{ $projet->categorie->libCat }}</td>
                        <td class="text-center">{{ $projet->statut->libStatut }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <ul>
                                        <li>
                                            <a class="dropdown-item" href="{{route('show_projet',$projet->id)}}">
                                                <i class="fas fa-eye text-primary me-2"></i>Détails
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="{{route('edit_projet',$projet->id)}}">
                                                <i class="fas fa-edit text-success me-2"></i> Modifier
                                            </a>
                                        </li>
                                        <li>
                                            <form action="#" method="POST" onsubmit="return confirmDelete();">
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

<!-- Scripts Bootstrap et jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Fonction de confirmation de suppression
    function confirmDelete() {
        return confirm('Voulez-vous vraiment supprimer ce projet ?');
    }

    // Barre de recherche
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#userTable tbody tr');

        rows.forEach(function (row) {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });

   
</script>

@endsection
