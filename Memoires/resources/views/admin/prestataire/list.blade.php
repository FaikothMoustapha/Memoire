@extends('layouts.master')
@section('content')

<div class="container py-4"> 
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📋 Liste des Prestataires</h3>
        <a href="{{route('add_prestataire')}}"><button type="submit" class="btn btn-primary rounded-2" >➕Ajouter</button></a>

    </div>
    <div >
        @if (session('success'))
        <div class="alert alert-success " role="alert">
            {{session('success')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
    </div>

    <!-- Barre de recherche -->
    <div class="row mb-3 justify-content-center">
        <div class="mb-3">
            <input type="text" id="searchInput" class="form-control text-center-placeholder" placeholder="🔍 Rechercher un projet...">
        </div>
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
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('edit_prestataire', $prestataire->id) }}">
                                                    <i class="fas fa-edit text-success me-2"></i> Modifier
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('delete_prestataire', $prestataire->id) }}" method="POST" onsubmit="return confirmDelete();">
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
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const input = document.getElementById('searchInput');
        input.addEventListener('keyup', function () {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#userTable tbody tr');
            rows.forEach(function (row) {
                let text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        });
    });
function confirmDelete(){
    if (confirm('voulez-vous vraiment supprimer cet stagiaire ?')) {
        document.getElementById('id').submit();
    }
}
</script>

<!-- Bootstrap 5 JS (pour dropdowns) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

@endsection