@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card shadow rounded-2">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center text-primary">📝 Enregistrement d’une activité</h2>
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
                
            <form action="{{route('store_activite')}}" method="post">
                @csrf 
                
                    <div class="">
                        <label class="form-label" >Libellé</label>
                        <input type="text" class="form-control rounded-2" name="libAct" id="libAct" required>
                        <div style="color: red">{{$errors->first('libAct')}}</div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="objectifs" class="form-label">Date prevu pour commencer</label>
                            <input type="date" class="form-control rounded-2" name="datePrev" id="datePrev" >
                            <div style="color: red">{{$errors->first('datePrev')}}</div>
                        </div>
                        <div class="col-md-6">
                            <label for="resAttendu" class="form-label">Date prevu pour la fin</label>
                            <input type="date" class="form-control rounded-2" name="dateFinAct" id="dateFinAct" >
                            <div style="color: red">{{$errors->first('dateFinAct')}}</div>
                        </div>
                    </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="statuts_projet_id" class="form-label">Statut de l'activité</label>
                        <select class="form-control rounded-2 choices-select" name="statut" id=""  >
                            <option >Début</option>
                            <option >Terminer</option>
                        </select>    
                    </div>
                    <div class="col-md-6">
                        <label for="etape_id" class="form-label">Etape</label>
                            <select class="form-control" id="input-select" name="etape_id" >
                                @foreach ($etapes as $etape)
                                    <option value="{{$etape->id}}">{{$etape->libEtape}}</option>
                                @endforeach
                            </select> 
                               
                    </div>
                </div>
                <div class="mb-4 text-center text-primary">
                    <button type="submit" class="btn btn-primary  rounded-2">
                        💾 Enregistrer l'activite
                    </button>
                </div>                 
            </form>
        </div>
    </div>
</div>
@endsection
