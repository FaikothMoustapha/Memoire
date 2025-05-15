@extends('layouts.master')
@section('content')

<div class="container">
    <div class="card shadow rounded-2">
        <div class="card-body p-5">
            <h2 class="mb-4 text-center text-primary">📝 Enregistrement d'un Prestataire</h2>
            
            <div>
                @include('alerte.alerte')

            </div>
                
            <form action="{{route('store_prestataire')}}" method="POST">
                @csrf 
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Code du prestataire</label>
                        <input type="text" class="form-control rounded-2" name="code" id="code" required>
                        <div style="color: red">{{ $errors->first('code') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nom de la structure</label>
                        <input type="text" class="form-control rounded-2" name="nomStructure" id="nomStructure" required>
                        <div style="color: red">{{ $errors->first('nomStructure') }}</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nom du responsable</label>
                        <input type="text" class="form-control rounded-2" name="nomResponsable" id="nomResponsable" required>
                        <div style="color: red">{{ $errors->first('nomResponsable') }}</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control rounded-2" name="email" id="email" required>
                        <div style="color: red">{{ $errors->first('email') }}</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Téléphone</label>
                    <input type="text" class="form-control rounded-2" name="telephone" id="telephone" required>
                    <div style="color: red">{{ $errors->first('telephone') }}</div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary rounded-2">
                        💾 Enregistrer le prestataire
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection""
