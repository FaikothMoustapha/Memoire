@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        {{-- Cartes statistiques --}}
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Projets Affectés</h6>
                            <h2>15</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-layer-group fa-2x" style="color: #007bff;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 100%;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets Terminés</h6>
                            <h2>5</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle fa-2x" style="color: #28a745;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 33%;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets En Cours</h6>
                            <h2>8</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-spinner fa-2x" style="color: #ffc107;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 53%;"></div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets Bloqués</h6>
                            <h2>2</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle fa-2x" style="color: #dc3545;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 13%;"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Ligne graphique donut + timeline réunions --}}
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
                            <div class="time">10h00</div>
                            <div class="desc">
                                <h3>Réunion de suivi</h3>
                                <h4>Service Projets</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-success"></div>
                            <div class="time">14h30</div>
                            <div class="desc">
                                <h3>Point d’avancement</h3>
                                <h4>Équipe Technique</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-warning"></div>
                            <div class="time">16h00</div>
                            <div class="desc">
                                <h3>Coordination</h3>
                                <h4>Responsables</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Tableau des projets récents --}}
<div class="card border-secondary shadow-sm">
    <div class="card-header">
        Projets Affectés
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-striped table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nom du projet</th>
                    <th>Structure</th>
                    <th>Statut</th>
                    <th>Dernière étape</th>
                    <th>Progression</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Suivi Infrastructures</td>
                    <td>Direction Générale</td>
                    <td><span class="badge bg-warning text-dark">En cours</span></td>
                    <td>Étude technique</td>
                    <td>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar bg-success" style="width: 40%">40%</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Digitalisation RH</td>
                    <td>DSI</td>
                    <td><span class="badge bg-success">Terminé</span></td>
                    <td>Livraison</td>
                    <td>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar bg-success" style="width: 100%">100%</div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Réforme Logistique</td>
                    <td>Direction Matériel</td>
                    <td><span class="badge bg-danger">Bloqué</span></td>
                    <td>Planification</td>
                    <td>
                        <div class="progress" style="height: 20px;">
                            <div class="progress-bar bg-danger" style="width: 10%">10%</div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
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
            data: [5, 8, 2, 1],  // Valeurs fictives à ajuster
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
