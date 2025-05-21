@extends('layouts.master')
@section('content')

<div class="container py-4"> 
    <div>
        @include('alerte.alerte')
    </div>

    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📋 LISTE DES PROJETS CRÉÉS</h3>
    </div>

    <!-- Barre de recherche -->
    <div class="mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="🔍 RECHERCHER UN PROJET...">
    </div>

    <!-- Tableau -->
    <div class="card shadow rounded-2">
        <div class="card-body p-0">
            <table class="table table-hover mb-0" id="projectTable">
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
                            <a href="{{route('affecter_projet',$projet->id)}}" class="btn btn-success btn-sm">
                                <i class="fas fa-user-plus"></i> Affecter
                            </a>
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
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Barre de recherche
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#projectTable tbody tr');

        rows.forEach(function (row) {
            let text = row.textContent.toLowerCase();
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>

@endsection
