{{-- @extends('layouts.master')
@section('content')
    <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
        <div  class="card-header" style="display: flex ">
            <div class="section-block" id="basicform">
                <h3 class="section-title" style="font-family: algerian">Enregistrement d'un stagiaire</h3>
                <p>Veuillez entrez vos information pour qu'on puisse vous enrégistrer.</p>
            </div>
            <a href="{{route('list_stagiaire')}}"><button type="submit" class="btn btn-space   btn-secondary  " >Retour à la list des stagiaires</button></a>
        </div>
        <div >
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

            @endif
                
        </div>
        <div class="card">
            
            <div class="card-body">
               
                <form method="post" action="{{route('', $stagiaires->id)}}">
                    @csrf
                <div style="display: flex">
                    <div   class="form-group col-lg-6  " >
                        <label for="inputText3" class="col-form-label">Nom</label>
                        <input id="inputText3" type="nom" class="form-control" name="nomStag" value="{{$stagiaires->nomStag}}" required >
                        <div style="color: red">{{$errors->first('nomStag')}}</div>
                    </div>
                    <div   class="form-group col-lg-6  " >
                        <label for="inputText3" class="col-form-label">Prénom</label>
                        <input id="inputText3" type="prenom" class="form-control" name="prenStag" value="{{$stagiaires->prenStag}}" required>
                        <div style="color: red">{{$errors->first('prenStag')}}</div>
                    </div>
                </div>
                <div style="display: flex">
                    <div class="form-group col-lg-6">
                        <label for="inputText3" class="col-form-label">Date de naissance</label>
                        <input id="inputText3" type="date" class="form-control" placeholder="Numbers" name="datNais" value="{{$stagiaires->datNais}}" >
                    </div>

                    
                    <div class="form-group col-lg-6">
                        <label for="input-select">Genre</label>
                        <select class="form-control" id="input-select" name="genre" value="{{$stagiaires->genre}}" >
                            <option>Masculin</option>
                            <option>Feminin</option>
                            <option>Autre</option>
                        </select>
                    </div>
                </div>
                <div style="display: flex">

                    <div class="form-group col-lg-6">
                        <label for="inputEmail"  class="col-form-label" >Email </label>
                        <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control" name="email" value="{{$stagiaires->email}}" required>
                        <div style="color: red">{{$errors->first('email')}}</div>
                    </div>
                    
                       
                    <div class="form-group col-lg-6">
                        <label for="inputText4" class="col-form-label">Télephone</label>
                        <input id="inputText4" type="number" class="form-control" placeholder="Numbers" name="tel" value="{{$stagiaires->tel}}" required>
                        <div style="color: red">{{$errors->first('datDebut')}}</div>
                    </div>
                </div>
            <div style="display: flex">
                <div class="form-group col-lg-6">
                    <label for="inputText4" class="col-form-label">Date de début de stage</label>
                    <input id="inputText4" type="date" class="form-control" placeholder="Numbers" name="datDebut" value="{{$stagiaires->datDebut->format('d m Y')}}" required>
                    <div style="color: red">{{$errors->first('datDebut')}}</div>
                </div>

                
                
                
                <div class="form-group col-lg-6">
                    <label for="inputText4" class="col-form-label">Date de fin de stage</label>
                    <input id="inputText4" type="date" class="form-control"  name="datFin" value="{{$stagiaires->datFin}}" required>
                    <div style="color: red">{{$errors->first('datFin')}}</div>
                </div>
            </div>
                  
            <div style="display: flex">
                <div class="form-group col-lg-4">
                    <label for="input-select">Ecole</label>
                    <select class="form-control" id="input-select" name="idEcole"  >
                        @foreach ($ecoles as $ecole)
                   
                        <option value="{{$ecole->id}}" {{$stagiaires->ecole_id == $ecole->id ? 'selected':''}}>{{$ecole->nomEcole}} </option>
                    
                    @endforeach
                    </select>
                
                </div>
                <div class="form-group col-lg-4">
                    <label for="input-select">Filière</label>
                    <select class="form-control" id="input-select" name="idFil" >
                    @foreach ($filieres as $filiere)
                   
                        <option value="{{$filiere->id}}" {{$stagiaires->filiere_id == $filiere->id ? 'selected':''}}>{{$filiere->libelle}}</option>
                    
                    @endforeach
                </select> 
                </div>
                <div class="form-group col-lg-4">
                    <label for="input-select">Type</label>
                    <select class="form-control" id="input-select" name="idTypStag" >
                    @foreach ($type_stages as $type)
                   
                        <option value="{{$type->id}}" {{$stagiaires->type_stage_id == $type->id ? 'selected':''}}>{{$type->libelle}}</option>
                    
                    @endforeach
                </select> 
                </div>
            </div>
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Theme</label>
                    <textarea required="" class="form-control" name="theme" >{{$stagiaires->theme}}</textarea>
                    <div style="color: red">{{$errors->first('theme')}}</div>
                </div>  
                <div class="form-group">
                    <label for="inputText3" class="col-form-label">Address</label>
                    <textarea required="" class="form-control" name="adrStag"  >{{$stagiaires->adrStag}}</textarea>
                    <div style="color: red">{{$errors->first('adrStag')}}</div>

                </div>  
                    <div class="col-sm-6 pl-0">
                        
                            <button type="submit" class="btn btn-space btn-primary" required>Enregistrer</button>
                            
                        </p>
                    </div>
                
                </form>
            </div>
          
        </div>
    </div>
</div>

@endsection --}}
