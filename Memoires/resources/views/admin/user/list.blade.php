{{-- @extends('layouts.master')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Liste des Utilisateurs</h5>
        </div>
            <div  class="card-header" style="display: flex ">
                <h5 class=" col-lg-11"></h5>
                <a href="{{route('add_user')}}"><button type="submit" class="btn btn-primary rounded-2" >
                    ➕Ajouter un utilisateur</button>
                </a>
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
                <div class="card-body p-0">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6">
                            <input type="text" id="searchInput" class="form-control text-center" placeholder="🔍 Rechercher un utilisateur...">
                        </div>
                    </div>
                    
                            <div class="table-responsive">
                                <table id="userTable" class="table table-hover mb-0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>NOM</th>
                                            <th>PRENOM</th>
                                            <th>EMAIL</th>
                                            <th>TÉLÉPHONE</th>
                                            <th>STATUT</th>
                                            <th>RÔLE</th>
                                            <th >ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->nom }}</td>
                                                <td>{{ $user->prenom }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->telephone }}</td>
                                                <td>
                                                    @if($user->statut === 'Actif')
                                                        <span class="badge bg-success">Actif</span>
                                                    @else
                                                        <span class="badge bg-danger">Inatif</span>
                                                    @endif
                                                </td>
                                                <td>{{ $user->role->libRole }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                                            <ul>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="{{route('show_user', $user->id)}}">
                                                                        <i class="fas fa-eye text-primary me-2"></i> Détails
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="{{ route('edit_user', $user->id) }}">
                                                                        <i class="fas fa-edit text-success me-2"></i> Modifier
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form action="{{ route('delete_user', $user->id) }}" method="POST" onsubmit="return confirmDelete();">
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
                        document.getElementById('searchInput').addEventListener('keyup', function () {
                            let filter = this.value.toLowerCase();
                            let rows = document.querySelectorAll('#userTable tbody tr');
                            rows.forEach(function (row) {
                                let text = row.textContent.toLowerCase();
                                row.style.display = text.includes(filter) ? '' : 'none';
                            });
                        });
                    function confirmDelete(){
                        if (confirm('voulez-vous vraiment supprimer cet stagiaire ?')) {
                            document.getElementById('id').submit();
                        }
                    }
                    </script>
                    
                </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.master')
@section('content')

<div class="container py-4"> 
    
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📋 Liste des Utilisateurs</h3>
        <a href="{{route('add_user')}}"><button type="submit" class="btn btn-primary rounded-2" >
            ➕Ajouter</button></a>

    </div>

    <!-- Barre de recherche -->
    <div class="mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="🔍 Rechercher un projet...">
    </div>
    <!-- Tableau -->
    <div class="card shadow rounded-2" >
        <div class="card-body p-0">
            <table class="table table-hover mb-0" id="userTable">
                <thead class="table-primary">
                    <tr>
                        <th>NOM</th>
                        <th>PRENOM</th>
                        <th>EMAIL</th>
                        <th>TÉLÉPHONE</th>
                        <th >STATUT</th>
                        <th>RÔLE</th>
                        <th >ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telephone }}</td>
                        
                            {{-- <td>
                                <form action="{{ route('toggle_user_status', $user->id) }}" method="POST">
                                    <label class="switch">
                                        <input type="checkbox" class="toggle-status" data-id="{{ $user->id }}" {{ $user->statut === 'Actif' ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </td>                         --}}

                            <td>
                                <label class="switch">
                                    <input type="checkbox" class="toggle-status" data-id="{{ $user->id }}" {{ $user->statut === 'Actif' ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </td>
                        {{-- <td>
                            <span id="status-label-{{ $user->id }}" class="ms-2">
                                {{ $user->statut }}
                            </span>
                        </td> --}}
                        
                        <td>{{ $user->role->libRole }}</td>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                        <ul>
                                            <li><a class="dropdown-item" href="{{route('show_user', $user->id)}}"><i class="fas fa-eye text-primary me-2"></i>Détails</a></li>

                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="{{ route('edit_user', $user->id) }}">
                                                    <i class="fas fa-edit text-success me-2"></i> Modifier
                                                </a>
                                            </li>
                                            <li>
                                                <form action="{{ route('delete_user', $user->id) }}" method="POST" onsubmit="return confirmDelete();">
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
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('change', '.toggle-status', function() {
        var userId = $(this).data('id');
        var isChecked = $(this).is(':checked');
        var statutText = isChecked ? 'Actif' : 'Inactif';

        $.ajax({
            url: `/user/toggle-status/${userId}`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#statut-' + userId).text(response.statut);
                alert(response.message);
            },
            error: function() {
                alert("Une erreur est survenue lors de la mise à jour.");
            }
        });
    });
</script> --}}
<!-- jQuery (obligatoire pour le script AJAX) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).on('change', '.toggle-status', function() {
        var userId = $(this).data('id');
        var isChecked = $(this).is(':checked');
        var statutText = isChecked ? 'Actif' : 'Inactif';

        $.ajax({
            url: `/user/toggle-status/${userId}`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#statut-' + userId).text(response.statut);
                alert(response.message);
            },
            error: function() {
                alert("Une erreur est survenue lors de la mise à jour.");
            }
        });
    });

     // Quand l'utilisateur tape dans la barre de recherche
     document.getElementById('searchInput').addEventListener('keyup', function () {
        // Récupère la valeur de recherche
        let filter = this.value.toLowerCase();

        // Sélectionne toutes les lignes du tableau
        let rows = document.querySelectorAll('#userTable tbody tr');

        // Parcours chaque ligne du tableau
        rows.forEach(function (row) {
            // Récupère le texte de la ligne
            let text = row.textContent.toLowerCase();

            // Affiche ou cache la ligne en fonction de la recherche
            row.style.display = text.includes(filter) ? '' : 'none';
        });
    });
</script>

@endsection

