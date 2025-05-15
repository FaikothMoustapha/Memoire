@extends('layouts.master')
@section('content')

<div class="container py-4"> 
    <!-- En-tête -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📋 Liste des Utilisateurs</h3>
        <a href="{{route('add_user')}}">
            <button type="submit" class="btn btn-primary rounded-2">➕ Ajouter</button>
        </a>
    </div>

    <!-- Barre de recherche -->
    <div class="mb-3">
        <input type="text" class="form-control" id="searchInput" placeholder="🔍 Rechercher un utilisateur...">
    </div>

    <!-- Tableau -->
    <div class="card shadow rounded-2">
        <div class="card-body p-0">
            <table class="table table-hover mb-0" id="userTable">
                <thead class="table-primary">
                    <tr>
                        <th>NOM</th>
                        <th>PRÉNOM</th>
                        <th>EMAIL</th>
                        <th>TÉLÉPHONE</th>
                        <th>STATUT</th>
                        <th>ETAT</th>
                        <th>RÔLE</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->telephone }}</td>

                        <td>
                            <form action="{{ route('toggle_user_status', $user->id) }}" method="POST">
                                @csrf
                                <label class="switch">
                                    <input type="checkbox" class="toggle-status" data-id="{{ $user->id }}" {{ $user->statut === 'Actif' ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </form>
                        </td>

                        <!-- Affichage stylisé de l'état -->
                        <td id="statut-{{ $user->id }}">
                            <span class="badge {{ $user->statut === 'Actif' ? 'bg-success' : 'bg-danger' }}">
                                {{ $user->statut }}
                            </span>
                        </td>

                           
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });

    $(document).on('change', '.toggle-status', function() {
        var userId = $(this).data('id');
        var isChecked = $(this).is(':checked');
        
        $.ajax({
            url: `/user/toggle-status/${userId}`,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                // Changement du texte et de la couleur
                const badge = $('#statut-' + userId + ' span');
                badge.text(response.statut);
                badge.removeClass('bg-success bg-danger');
                badge.addClass(response.statut === 'Actif' ? 'bg-success' : 'bg-danger');

                alert(response.message);
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                alert("Une erreur est survenue lors de la mise à jour : " + xhr.statusText);
            }
        });
    });

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
