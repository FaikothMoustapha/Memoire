@extends('layouts.master')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><strong>Liste des Activites</strong></h5>
        </div>
            <div  class="card-header" style="display: flex ">
                <h5 class=" col-lg-11"></h5>
                <a href="{{route('add_activite')}}"><button type="submit" class="btn btn-primary rounded-2" >➕Ajouter</button></a>
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
                            <input type="text" id="searchInput" class="form-control text-center" placeholder="🔍 Rechercher une activites...">
                        </div>
                    </div>
                    
                            <div class="table-responsive">
                                <table id="userTable" class="table table-hover mb-0">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>Libelle</th>
                                            <th>Date prevu pour le debut</th>
                                            <th>Date prevu pour la fin</th>
                                            <th>statut</th>
                                            <th>Etape associer</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach ($activites as $activite)
                                            <tr>
                                                <td>{{$activite->libAct}}</td>
                                                <td>{{$activite->datePrev}}</td>
                                                <td>{{$activite->dateFinAct}}</td>
                                                <td>{{$activite->statut}}</td>                                                
                                                <td>{{$activite->etape->libEtape}}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                                            <ul>
                                                                <li>
                                                                    <a class="dropdown-item d-flex align-items-center" href="{{route('edit_activite',$activite->id)}}">
                                                                        <i class="fas fa-edit text-success me-2"></i> Modifier
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <form action="{{route('delete_activite',$activite->id)}}" method="POST" onsubmit="return confirmDelete();">
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
@endsection
