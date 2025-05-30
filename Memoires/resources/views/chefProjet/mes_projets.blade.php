@extends('layouts.master')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center text-primary">Projets affectés à : <span class="text-dark">{{ $chef->nom }}</span></h2>

    @if($projets->count())
        <div class="row">
            @foreach($projets as $projet)
                <div class="col-md-6 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $projet->libProj }}</h5>
                            <div class="mt-auto">
                                <a href="{{ route('showp_projet', $projet->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                    Voir le projet
                                </a>
                                <a href="{{ route('projets_etapes', $projet->id) }}" class="btn btn-sm btn-primary">
                                    Étapes associées
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning text-center" role="alert">
            Aucun projet affecté à ce chef.
        </div>
    @endif
</div>
@endsection
