@extends('layouts.master')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="text-primary">📋 Liste des documents</h3>
        <a href="{{route('documents_add')}}">
            <button type="submit" class="btn btn-primary rounded-2">➕ Ajouter</button>
        </a>
    </div>

    <table class="table table-bordered">
        <thead class="table-primary text-center">
            <tr>
                <th>Nom du document</th>
                <th>Type</th>
                <th>Projet</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $doc)
                <tr>

                    <td>{{ $doc->nomDoc }}</td>
                    <td>{{ $doc->type->libtype ?? '-' }}</td>
                    <td>{{ $doc->projet->libProj ?? '-' }}</td>
                    <td class="text-center" style="position: relative;">
                        <a href="{{ asset('storage/' . $doc->chemin) }}" target="_blank" class="btn btn-primary">
                            Voir
                        </a>
                            <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownDownload{{ $doc->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                Télécharger
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownDownload{{ $doc->id }}">
                                <li>
                                    <a class="dropdown-item" href="{{ asset('storage/' . $doc->chemin) }}" download>
                                        <i class="fas fa-file-pdf me-2"></i> PDF
                                    </a>
                                </li>
                                <li>
                                    <button class="dropdown-item" onclick="printDocument('{{ asset('storage/' . $doc->chemin) }}')">
                                        <i class="fas fa-print me-2"></i> Imprimer
                                    </button>
                                </li>
                            </ul>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
function toggleOptions(id) {
    const div = document.getElementById('options-' + id);
    if(div.style.display === 'none' || div.style.display === '') {
        div.style.display = 'block';
    } else {
        div.style.display = 'none';
    }
}

function printDocument(url) {
    const printWindow = window.open(url, '_blank');
    printWindow.focus();
    printWindow.print();
}
</script>

@endsection
