@extends('layouts.master')
@section('content')
    <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        
        <div  class="card-header" style="display: flex ">
            <div class="section-block" id="basicform">
                <h3 class="section-title" style="font-family: algerian">Modification dun utilisateur </h3>
                <p>Veuillez modifier vos information pour qu'on puisse vous enrégistrer.</p>
            </div>
            <a href="{{route('list_user')}}"><button type="submit" class="btn btn-space   btn-secondary  " >Retour à la list des Utilisateur</button></a>
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
               
                <form method="post" action="{{route('update_user', $users->id)}}">
                    @csrf
                        <div class="form-group col-lg-12">
                            <label for="">Nom</label>
                            <input type="text" class="form-control"  name="nom" value="{{$users->nom}}" required>
                            <div style="color: red">{{$errors->first('nom')}}</div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label >Prenom</label>
                            <input type="text" class="form-control"  name="prenom" value="{{$users->prenom}}" required>
                            <div style="color: red">{{$errors->first('prenom')}}</div>
                        </div>
                        <div class="form-group col-lg-12">
                            <label >Email</label>
                            <input type="email" class="form-control"  name="email" placeholder="example@gmail.com" value="{{$users->email}}" required>
                            <div style="color: red">{{$errors->first('email')}}</div>
                        </div>
                        <div style="display: flex">
                            <div class="form-group col-lg-6">
                                <label >Telephone</label>
                                <input type="number" class="form-control"  name="telephone" placeholder="Nombre" value="{{$users->telephone}}">
                                <div style="color: red">{{$errors->first('telephone')}}</div>
                            </div>
                            <div class="form-group col-lg-6">
                                <label >Mot de passe</label>
                                <input type="password" class="form-control"  name="password" value="{{$users->password}}" required>
                                <div style="color: red">{{$errors->first('password')}}</div>
                            </div>
                        </div>
                        <div style="display: flex">
                            <div class="form-group col-lg-6">
                                <label >Statut</label>
                                
                                <select  class="form-control" name="statut" id="" required>
                                    <option value="{{$users->statut}}" >Actif</option>
                                    <option value="{{$users->statut}}" >Inactif</option>
                                </select>
                                
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="input-select">Role</label>
                                <div style="display: flex">
                                <select class="form-control" id="input-select" name="role_id" required>
                                        @foreach ($roles as $role)
                                   
                                        <option value="{{$role->id}}" {{$users->role_id == $role->id ? 'selected':''}}>{{$role->libRole}} </option>
                                    
                                    @endforeach
                                   
                                </select> 
                            </div>
                        </div>
                    <div >
                        <button type="submit" class="btn btn-primary  " >Enregistrer</button>
                    </div>
                </form>
            </div>
          
        </div>
    </div>
</div>

@endsection
