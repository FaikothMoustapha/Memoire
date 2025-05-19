@extends('layouts.master')

@section('content')
    <div class="container">
        <h3>Projets affectés à : {{ $chef->nom }}</h3>

        @if($projets->count())
            <ul class="list-group">
                @foreach($projets as $projet)
                    <li class="list-group-item">
                        {{ $projet->libProj }} 
                        <a href="#" class="btn btn-sm btn-primary float-right">Voir</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucun projet affecté à ce chef.</p>
        @endif
    </div>
@endsection
