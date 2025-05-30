@extends('layouts.master')
@section('content')
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css' rel='stylesheet' />
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js'></script>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <style>
            body {
                font-family: Arial, sans-serif;
                padding: 2rem;
                background: #f5f5f5;
            }

            .dashboard-container {
                display: flex;
                flex-wrap: wrap;
                gap: 2rem;
            }

            .card {
                background: #fff;
                padding: 1rem;
                border-radius: 1rem;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                flex: 1;
                min-width: 300px;
            }

            .timeline-item {
                margin-bottom: 1rem;
                padding-left: 1rem;
                border-left: 4px solid #3490dc;
            }
        </style>
    </head>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div class="container-fluid">
    <div >
        @include('alerte.alerte')
    </div>
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Projets affectés</h6>
                            <h2>{{ $totalAffectes }}</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-layer-group fa-2x" style="color: #007bff;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-info" role="progressbar" style="height: 8px; width: 100%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets terminés</h6>
                            <h2>{{ $totalTermines }}</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle fa-2x" style="color: #28a745;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" role="progressbar" style="height: 8px; width: {{ $pourcentageTermines }}%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets en cours</h6>
                            <h2>{{ $totalEnCours }}</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-spinner fa-2x" style="color: #ffc107;"></i>
                        </div>
                    </div>
                </div>
                    <div class="progress progress-sm">
                <div class="progress-bar bg-warning" role="progressbar" style="height: 8px; width: {{ $pourcentageEnCours }}%;"></div>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Nouveaux projets </h6>
                            <h2>{{ $totalNouveaux }}</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-lightbulb fa-2x" style="color: #6f42c1;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar" role="progressbar" style="height: 8px; width: {{ $pourcentageNouveaux }}%; background-color: #6f42c1;"></div>
                </div>

            </div>
        </div>
    </div>
    <div class=" d-flex">
        <!-- Donut Chart -->
         <div class="col-md-6">
            <div class="card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Projets affectés</h6>
                            <h2>{{ $totalAffectes }}</h2>
                        </div>
                    </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-info" role="progressbar" style="height: 8px; width: 100%;"></div>
                </div>
           
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets terminés</h6>
                            <h2>{{ $totalTermines }}</h2>
                        </div>
                    </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" role="progressbar" style="height: 8px; width: {{ $pourcentageTermines }}%;"></div>
                </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets en cours</h6>
                            <h2>{{ $totalEnCours }}</h2>
                        </div>
                    </div>
                
                <div class="progress progress-sm">
                <div class="progress-bar bg-warning" role="progressbar" style="height: 8px; width: {{ $pourcentageEnCours }}%;"></div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Nouveaux projets </h6>
                            <h2>{{ $totalNouveaux }}</h2>
                        </div>
                    </div>
                
                <div class="progress progress-sm">
                    <div class="progress-bar" role="progressbar" style="height: 8px; width: {{ $pourcentageNouveaux }}%; background-color: #6f42c1;"></div>
                </div>
    </div>
            </div>
        </div>
        <!-- Reunions -->
        <div class="col-md-6">
            <div class="card" >
                <div class="row align-items-end">
                    <div class="page-header-title">
                        <i class="ik ik-calendar bg-blue"></i>
                        <div class="d-inline">
                            <h5>Calendrier des Réunions</h5>
                            <span>Affichez toutes les réunions prévues ici</span>
                        </div>
                    </div>
                            
                    <div class="col-lg-3">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="#"><i class="ik ik-home"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Calendrier</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                    

                    <!-- Calendrier FullCalendar -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            <!-- Div pour afficher le calendrier -->
                                <div id="calendar"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet" />
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        // Vérifier que les réunions existent avant de les afficher
        var events = {!! json_encode($reunions) !!};

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            editable: false,
            selectable: false,
            events: events,
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            dayMaxEvents: true, // Limite d'événements par jour
        });

        calendar.render();
    });

    </script>
    
@endpush

