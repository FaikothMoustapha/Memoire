@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Projets</h6>
                            <h2>{{ $termines + $encours + $nouveaux }}</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-layer-group fa-2x" style="color: #007bff;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets terminés</h6>
                            <h2>{{ $termines }}</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle fa-2x" style="color: #28a745;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 78%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets en cours</h6>
                            <h2>{{ $encours }}</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-spinner fa-2x" style="color: #ffc107;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 31%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Nouveaux projets</h6>
                            <h2>{{ $nouveaux }}</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-plus-circle fa-2x" style="color: #dc3545;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 62%;"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Row charts & réunions --}}
    <div class="row">
        {{-- Donut Chart --}}
        <div class="col-md-6">
            <div class="card" style="min-height: 422px;">
                <div class="card-header"><h3>Répartition des Projets</h3></div>
                <div class="card-body">
                    <canvas id="projetsChart"></canvas>
                </div>
            </div>
        </div>

        {{-- Réunions Timeline --}}
        <div class="col-md-6">
            <div class="card" style="min-height: 422px;">
                <div class="card-header">
                    <h3>Réunions</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body timeline">
                    <div class="header bg-theme" style="background-image: url('{{ asset('img/placeholder/placeimg_400_200_nature.jpg') }}')">
                        <div class="color-overlay d-flex align-items-center">
                            <div class="day-number">{{ now()->format('d') }}</div>
                            <div class="date-right">
                                <div class="day-name">{{ now()->format('l') }}</div>
                                <div class="month">{{ now()->format('F Y') }}</div>
                            </div>
                        </div>                                
                    </div>
                    <ul>
                        <li>
                            <div class="bullet bg-primary"></div>
                            <div class="time">09h00</div>
                            <div class="desc">
                                <h3>Réunion d'équipe</h3>
                                <h4>Direction des projets</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-success"></div>
                            <div class="time">11h30</div>
                            <div class="desc">
                                <h3>Comité de validation</h3>
                                <h4>Approbation des budgets</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-warning"></div>
                            <div class="time">15h00</div>
                            <div class="desc">
                                <h3>Suivi des livrables</h3>
                                <h4>État d'avancement</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Chart JS --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('projetsChart').getContext('2d');
    const projetsChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Terminés', 'En cours', 'Nouveaux', 'Abandonnés'],
            datasets: [{
                data: [{{ $termines }}, {{ $encours }}, {{ $nouveaux }}, {{ $abandonnes ?? 0 }}],
                backgroundColor: [
                    'rgba(75, 192, 192, 0.7)',    // Terminés
                    'rgba(255, 205, 86, 0.7)',    // En cours
                    'rgba(255, 99, 132, 0.7)',    // Nouveaux
                    'rgba(108, 117, 125, 0.7)'    // Abandonnés
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(108, 117, 125, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                },
                title: {
                    display: true,
                    text: 'Répartition des projets par statut'
                }
            }
        }
    });
</script>
@endsection
