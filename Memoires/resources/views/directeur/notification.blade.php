@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <h3>Notifications reçues</h3>
     <!-- Notification de succès -->
            <div>
                @include('alerte.alerte')
            </div>

    @forelse ($notifications as $notification)
        <div class="alert alert-{{ $notification->read_at ? 'secondary' : 'info' }} d-flex justify-content-between align-items-center">
            <div>
                <strong>{{ $notification->created_at->diffForHumans() }} :</strong>
                {{ $notification->data['message'] ?? 'Pas de contenu' }}
            </div>

            <div class="d-flex align-items-center">

                {{-- Affecter --}}
                @if(isset($notification->data['projet_id']))
                    <a href="{{ route('affecter_projet', $notification->data['projet_id']) }}"
                       class="btn btn-sm btn-outline-primary me-2"
                       title="Affecter ce projet">
                        📌
                    </a>

                    {{-- Voir détails --}}
                    <a href="{{ route('edit_projet', $notification->data['projet_id']) }}"
                       class="btn btn-sm btn-outline-secondary me-2"
                       title="Voir les détails du projet">
                        👁️
                    </a>
                @endif

                {{-- Marquer comme lue --}}
                <a href="{{ route('marquer_lecture', $notification->id) }}"
                   class="btn btn-sm btn-outline-success me-2"
                   title="Marquer comme lue">
                    ✅
                </a>

                {{-- Supprimer --}}
                <form action="{{ route('notification_delete', $notification->id) }}" method="POST" onsubmit="return confirm('Supprimer cette notification ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-outline-danger" title="Supprimer cette notification">
                        🗑️
                    </button>
                </form>

            </div>
        </div>
    @empty
        <p>Aucune notification reçue.</p>
    @endforelse
</div>
@endsection
