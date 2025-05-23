libEtape
@extends('layouts.master')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><strong>Etaapes</strong></h5>
        </div>
            <div  class="card-header" style="display: flex ">
                <h5 class=" col-lg-11"></h5>
                <a href="{{route('add_activite')}}"><button type="submit" class="btn btn-primary rounded-2" >➕Ajouter</button></a>
            </div>
            <div >
                @include('alerte.alerte')
            </div>
                <div class="card-body p-0">
                    <div class="row mb-3 justify-content-center">
                        <div class="col-md-6">
                            <input type="text" id="searchInput" class="form-control text-center" placeholder="🔍 Rechercher une activites...">
                            <h2>Étapes du projet : {{ $projet->libProj }}</h2>
                        </div>
                    </div>
                    
                            <div class="table-responsive">
                                <table id="userTable" class="table table-hover mb-0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Etapes</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <div class="container">
                                            <tr>
                                                <td>
                                                    @if($etapes && $etapes->count())
                                                        <ul>
                                                            @foreach($etapes as $etape)
                                                                <li>{{ $etape->libEtape }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="dropdown-item d-flex align-items-center" href="{{route('act_proj')}}">
                                                        <button>
                                                            <i class="fas fa-edit text-success me-2"></i> Activites associer
                                                        </button>
                                                    </a>
                                                </td>
                                            </tr> 
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
@endsection
