@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>🔔 Notifications reçues</h3>
        @if(auth()->user()->unreadNotifications->count() > 0)
            <a href="{{ route('notification_all_read') }}" class="btn btn-sm btn-success">
                ✅ Tout marquer comme lues
            </a>
        @endif
    </div>

    <!-- Notification de succès -->
    @include('alerte.alerte')

    @php
        $grouped = $notifications->groupBy(function($notif) {
            return $notif->created_at->format('d M Y');
        });
    @endphp

    @forelse($grouped as $date => $group)
        <h5 class="text-primary mt-4">{{ $date }}</h5>
        @foreach($group as $notification)
            <div class="alert alert-{{ $notification->read_at ? 'secondary' : 'info' }} d-flex justify-content-between align-items-center">
                <div>
                    <strong style="{{ $notification->read_at ? '' : 'font-weight:bold;' }}">
                        {{ $notification->created_at->format('H:i') }} :
                    </strong>
                    {{ $notification->data['message'] ?? 'Pas de contenu' }}
                </div>
                <div class="d-flex align-items-center">
                    @if(isset($notification->data['projet_id']))
                        <a href="{{ route('affecter_projet', $notification->data['projet_id']) }}" class="btn btn-sm btn-outline-primary me-2" title="Affecter">
                            ⚙️
                        </a>
                        <a href="{{ route('edit_projet', $notification->data['projet_id']) }}" class="btn btn-sm btn-outline-secondary me-2" title="Détails">
                            📄
                        </a>
                    @endif
                    @if(!$notification->read_at)
                        <a href="{{ route('marquer_lecture', $notification->id) }}" class="btn btn-sm btn-outline-success me-2" title="Marquer comme lue">
                            ✅
                        </a>
                    @endif
                    <form action="{{ route('notification_delete', $notification->id) }}" method="POST" onsubmit="return confirm('Supprimer cette notification ?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" title="Supprimer">🗑️</button>
                    </form>
                </div>
            </div>
        @endforeach
    @empty
        <p>Aucune notification reçue.</p>
    @endforelse
</div>
@endsection
