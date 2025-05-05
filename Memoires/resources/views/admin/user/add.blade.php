@extends('layouts.master')
@section('content')
<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header mx-auto pt-5"><h3>Enregistrer un utilisateur</h3></div>
            <div >
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
            </div>
    
                @endif
            <div class="card-body">
                
                <form method="Post" action="{{route('store_user')}}" class="forms-sample">
                    @csrf
                    <div class="form-group col-lg-12">
                        <label for="">Nom</label>
                        <input type="text" class="form-control"  name="nom" required>
                        <div style="color: red">{{$errors->first('nom')}}</div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label >Prenom</label>
                        <input type="text" class="form-control"  name="prenom" required>
                        <div style="color: red">{{$errors->first('prenom')}}</div>
                    </div>
                    <div class="form-group col-lg-12">
                        <label >Email</label>
                        <input type="email" class="form-control"  name="email" placeholder="example@gmail.com" required>
                        <div style="color: red">{{$errors->first('email')}}</div>
                    </div>
                    <div style="display: flex">
                        <div class="form-group col-lg-6">
                            <label >Telephone</label>
                            <input type="number" class="form-control"  name="telephone" >
                            <div style="color: red">{{$errors->first('telephone')}}</div>
                        </div>
                        <div class="form-group col-lg-6">
                            <label >Mot de passe</label>
                            <input type="password" class="form-control"  name="password" required>

                        </div>
                    </div>
                    <div style="display: flex">
                        <div class="form-group col-lg-6">
                            <label >Statut</label>
                            <select class="form-control" name="statut" id="" required>
                                <option >Actif</option>
                                <option >Inactif</option>
                            </select>
                            
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="input-select">Role</label>
                            <select class="form-control" id="input-select" name="role_id" >
                            @foreach ($roles as $Role)
                        
                                <option value="{{$Role->id}}">{{$Role->libRole}}</option>
                            
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

    
@endsection