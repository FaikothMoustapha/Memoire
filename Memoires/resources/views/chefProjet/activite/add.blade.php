@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h3>Default form</h3></div>
            <div class="card-body">
                <form method="post" action="{{route('add_activite')}}" class="forms-sample">
                    <div class="form-group">
                        <label for="">Libelle</label>
                        <input type="text" class="form-control" id="exampleInputUsername1"  name="libAct">
                    </div>
                    <div class="form-group">
                        <label for="">Date prevu pour commencer</label>
                        <input type="date" class="form-control"  name="datePrev">
                    </div>
                    <div class="form-group">
                        <label for="">date de prevu pour la fin</label>
                        <input type="date" class="form-control"  placeholder="Password" name="dateFinAct">
                    </div>
                    <div class="form-group">
                        <label for="">Statut</label>
                        <select name="statut" id="">
                            <option >Actif</option>
                            <option >Inactif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Etape</label>
                        <input type="password" class="form-control"  placeholder="Password" name="etapes">
                    </div>
                    
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                  </form>
            </div>
        </div>
    </div>

    
@endsection