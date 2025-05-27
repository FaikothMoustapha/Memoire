@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📅 Liste des réunions</h3>
        <a href="{{route('reunions.create')}}">
            <button type="submit" class="btn btn-primary rounded-2">➕ Ajouter</button>
        </a>
    </div>

    <table class="table table-bordered text-center">
        <thead class="table-primary">
            <tr>
                <th>Ordre du jour</th>
                <th>Date</th>
                <th>Heure</th>
                <th>Lieu</th>
                <th>Projet</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reunions as $reunion)
                <tr>
                    <td>{{ $reunion->odreJour }}</td>
                    <td>{{ $reunion->dateReunion }}</td>
                    <td>{{ $reunion->heure }}</td>
                    <td>{{ $reunion->lieu }}</td>
                    <td>{{ $reunion->projet->libProj ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
