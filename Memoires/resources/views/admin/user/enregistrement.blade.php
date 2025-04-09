@extends('layouts.master')
@section('content')
<div class="row">
    <div class="container">
        <div class="card">
            <div class="card-header"><h3>Default form</h3></div>
            <div class="card-body">
                <form method="post" action="" class="forms-sample">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" class="form-control"  name="nom">
                    </div>
                    <div class="form-group">
                        <label >Prenom</label>
                        <input type="text" class="form-control"  name="prenom">
                    </div>
                    <div class="form-group">
                        <label >Telephone</label>
                        <input type="number" class="form-control"  name="telephone">
                    </div>
                    <div class="form-group">
                        <label >Mot de passe</label>
                        <input type="password" class="form-control"  name="password">
                    </div>
                    <div class="form-group">
                        <label >Statut</label>
                        <select name="statut" id="">
                            <option >Actif</option>
                            <option >Inactif</option>
                        </select>
                        
                    </div>
                    
                    <div class="form-group">
                        <label >Role</label>
                        <select name="" id="">
                            <option value=""></option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
            </div>
        </div>
    </div>

    
@endsection