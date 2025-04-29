@extends('layouts.master')
@section('content')
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
    <div class="card">
       
            <div class=" mx-auto pt-5">
                <h5  ><strong >LISTES DES ACTIVITES</strong></h5>
                
            </div>
            <div  class="card-header" style="display: flex ">
                
                <a href="{{route('add_activite')}}"><button type="submit" class="btn btn-success " >Ajouter</button></a>
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
                            
                            <th colspan="3" class="col-sm-2 col-md-2 col-lg-2 f-icon" >Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($activites as $activite) --}}
                          
                        <tr>
                            {{-- <td>{{$activite->libAct}}</td>
                            <td>{{$activite->datePrev}}</td>
                            <td>{{$activite->dateFinAct}}</td>
                            <td>{{$activite->statut}}</td> --}}
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> 
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                
                                        <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                        <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                        @method('DELETE')
                                        <a href=""><button type="submit" class="btn btn-space btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                              
                                    </div>
                                </div>
                            </td>
                              
                                
                        

                        </tr>
                        <tr>
                            {{-- <td>{{$activite->libAct}}</td>
                            <td>{{$activite->datePrev}}</td>
                            <td>{{$activite->dateFinAct}}</td>
                            <td>{{$activite->statut}}</td> --}}
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> 
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                
                                        <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                        <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                        @method('DELETE')
                                        <a href=""><button type="submit" class="btn btn-space   btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                              
                                    </div>
                                </div>
                            </td>
                              
                                
                        

                        </tr>
                        <tr>
                            {{-- <td>{{$activite->libAct}}</td>
                            <td>{{$activite->datePrev}}</td>
                            <td>{{$activite->dateFinAct}}</td>
                            <td>{{$activite->statut}}</td> --}}
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> 
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><button class="btn btn-space btn-primary">Action</button></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                
                                        <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                        <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                        @method('DELETE')
                                        <a href=""><button type="submit" class="btn btn-space btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                              
                                    </div>
                                </div>
                            </td>
                              
                                
                        

                        </tr>
                        <tr>
                            {{-- <td>{{$activite->libAct}}</td>
                            <td>{{$activite->datePrev}}</td>
                            <td>{{$activite->dateFinAct}}</td>
                            <td>{{$activite->statut}}</td> --}}
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> 
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                
                                        <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                        <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                        @method('DELETE')
                                        <a href=""><button type="submit" class="btn btn-space   btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                              
                                    </div>
                                </div>
                            </td>
                              
                                
                        

                        </tr>
                        <tr>
                            {{-- <td>{{$activite->libAct}}</td>
                            <td>{{$activite->datePrev}}</td>
                            <td>{{$activite->dateFinAct}}</td>
                            <td>{{$activite->statut}}</td> --}}
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> 
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                
                                        <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                        <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                        @method('DELETE')
                                        <a href=""><button type="submit" class="btn btn-space   btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                              
                                    </div>
                                </div>
                            </td>
                              
                                
                        

                        </tr>
                        <tr>
                            {{-- <td>{{$activite->libAct}}</td>
                            <td>{{$activite->datePrev}}</td>
                            <td>{{$activite->dateFinAct}}</td>
                            <td>{{$activite->statut}}</td> --}}
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> lleelllm</td>
                            <td> 
                                <div class="dropdown">
                                    <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Action</a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                
                                        <a href=""><button type="submit" class="btn btn-space btn-primary" ><i class="fas fa-eye"></i></button></a>
                                        <a href="" ><button type="submit" class="btn btn-success  " ><i class="fas fa-edit"></i></button></a>
                                        @method('DELETE')
                                        <a href=""><button type="submit" class="btn btn-space   btn-secondary" onclick="confirmDelete()" ><i class="fas fa-prescription-bottle"></i></button></a>
                              
                                    </div>
                                </div>
                            </td>
                              
                                
                        

                        </tr>

                        {{-- @endforeach --}}
                        
                       
                </table>
                <script>
                    function confirmDelete(){
                        if (confirm('voulez-vous vraiment supprimer cet activité ?')) {
                            document.getElementById('id').submit();
                        }
                    }
                </script>
            </div>
        </div>
    </div>
</div>
@endsection