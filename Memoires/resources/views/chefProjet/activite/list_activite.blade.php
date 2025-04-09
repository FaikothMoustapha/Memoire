@extends('layouts.master')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
       
            <div class=" mx-auto pt-5">
                <h5  ><strong >LISTES DES activites</strong></h5>
                
            </div>
            <div  class="card-header" style="display: flex ">
                <h5 class=" col-lg-11">Basic Table</h5>
                <a href="{{route('add_stagiaire')}}"><button type="submit" class="btn btn-space   btn-secondary  " >Ajouter</button></a>
            </div>
            <div >
                @if (session('success'))
                <div class="alert alert-danger " role="alert">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
    
                @endif
                    
            </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered first" class="mx-4">
                    <thead>
                        <tr>
                            <th>Libelle</th>
                            <th>Date prevu pour le debut</th>
                            <th>Date prevu pour la fin</th>
                            <th>statut</th>
                            <th>statut</th>
                            <th colspan="3" class="col-sm-2 col-md-2 col-lg-2 f-icon" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stagiaires as $stagiaire)
                          
                        <tr>
                            <td>{{$stagiaire->nomStag}}</td>
                            <td>{{$stagiaire->prenStag}}</td>
                            <td>{{$stagiaire->ecole->nomEcole}}</td>
                            <td>{{$stagiaire->filiere->libelle}}</td>
                            <td>{{$stagiaire->datDebut->format('d m Y')}}</td>
                            <td>{{$stagiaire->datFin->format('d m Y')}}</td>
                            <td>{{$stagiaire->theme}}</td>

                            
                            
                            <td><a href="{{route('show_activite', $activite->id)}}"><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a></td>
                            <td ><a href="{{route('edit_activite', $activite->id)}}" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a></td>
                            @method('DELETE')
                            <td><a href="{{route('delete_activite', $activite->id)}}"><button type="submit" class="btn btn-space   btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a></td >
                                
                            
                        

                        </tr>

                        @endforeach
                        
                       
                </table>
                <script>
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