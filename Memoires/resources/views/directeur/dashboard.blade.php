@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Projets affectés</h6>
                            <h2>41,410</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-layer-group fa-2x" style="color: #007bff;"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">Total Comments</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets terminés</h6>
                            <h2>41,410</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-check-circle fa-2x" style="color: #28a745;"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">61% higher than last month</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100" style="width: 78%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Projets en cours</h6>
                            <h2>410</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-spinner fa-2x" style="color: #ffc107;"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">Total Events</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100" style="width: 31%;"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Nouveaux projets </h6>
                            <h2>1,410</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-plus-circle fa-2x" style="color: #dc3545;"></i>
                        </div>
                    </div>
                    <small class="text-small mt-10 d-block">6% higher than last month</small>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100" style="width: 62%;"></div>
                </div>
            </div>
        </div>
        
        
        
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card" style="min-height: 422px;">
                <div class="card-header"><h3>Donut chart</h3></div>
                <div class="card-body">
                    <div id="c3-donut-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card" style="min-height: 422px;">
                <div class="card-header">
                    <h3>Timeline</h3>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body timeline">
                    <div class="header bg-theme" style="background-image: url('img/placeholder/placeimg_400_200_nature.jpg')">
                        <div class="color-overlay d-flex align-items-center">
                            <div class="day-number">8</div>
                            <div class="date-right">
                                <div class="day-name">Monday</div>
                                <div class="month">February 2018</div>
                            </div>
                        </div>                                
                    </div>
                    <ul>
                        <li>
                            <div class="bullet bg-pink"></div>
                            <div class="time">11am</div>
                            <div class="desc">
                                <h3>Attendance</h3>
                                <h4>Computer Class</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-green"></div>
                            <div class="time">12pm</div>
                            <div class="desc">
                                <h3>Design Team</h3>
                                <h4>Hangouts</h4>
                            </div>
                        </li>
                        <li>
                            <div class="bullet bg-orange"></div>
                            <div class="time">2pm</div>
                            <div class="desc">
                                <h3>Finish</h3>
                                <h4>Go to Home</h4>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection





{{-- @extends('layouts.master')
@section('content')
    <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard DSI</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 2rem;
        }
        .dashboard-container {
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        .chart-container {
            margin-top: 2rem;
        }
    </style>
</head>
<body>

    <div style="display: flex; gap: 1rem; flex-wrap: wrap; justify-content: space-between; margin-bottom: 2rem;">
        <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-layer-group fa-2x" style="color: #007bff;"></i>
            <div style="flex: 1; min-width: 180px; background: #ffffff; padding: 1rem; border-left: 5px solid #007bff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <strong>Total projets</strong>
                <h3>{{ $termines + $encours + $nouveaux }}</h3>
            </div>
        </div>
        <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-check-circle fa-2x" style="color: #28a745;"></i>
            <div style="flex: 1; min-width: 180px; background: #ffffff; padding: 1rem; border-left: 5px solid #28a745; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <strong>Terminés</strong>
                <h3>{{ $termines }}</h3>
            </div>
        </div>

        <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-spinner fa-2x" style="color: #ffc107;"></i>
            <div style="flex: 1; min-width: 180px; background: #ffffff; padding: 1rem; border-left: 5px solid #ffc107; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <strong>En cours</strong>
                <h3>{{ $encours }}</h3>
            </div>
        </div>
        <div style="display: flex; align-items: center; gap: 8px;">
            <i class="fas fa-plus-circle fa-2x" style="color: #dc3545;"></i>
            <div style="flex: 1; min-width: 180px; background: #ffffff; padding: 1rem; border-left: 5px solid #dc3545; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <strong>Nouveaux</strong>
                <h3>{{ $nouveaux }}</h3>
            </div>
        </div>
        
    </div>
    
    <div class="dashboard-container">
        <h2>Suivi des Projets - DSI</h2>
        <div class="chart-container">
            <canvas id="projetsChart"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('projetsChart').getContext('2d');
    Chart.register({
        id: 'centerText',
        beforeDraw: function(chart) {
            const width = chart.width;
            const height = chart.height;
            const ctx = chart.ctx;

            ctx.restore();
            const fontSize = (height / 114).toFixed(2);
            ctx.font = "40px sans-serif";
            ctx.textBaseline = "middle";

            const text = "Suivi des projets";
            const textX = Math.round((width - ctx.measureText(text).width) / 2);
            const textY = height / 2;

            ctx.fillStyle = "#333"; // couleur du texte
            ctx.fillText(text, textX, textY);
            ctx.save();
        }
    });
        const projetsChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Projets terminés', 'En cours', 'Nouveaux projets', 'Abandonnés'],
                datasets: [{
                    data: [{{ $termines }}, {{ $encours }}, {{ $nouveaux }}, {{ $abandonnes }}],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.7)', // Terminés
                        'rgba(255, 205, 86, 0.7)', // En cours
                        'rgba(255, 99, 132, 0.7)',// Nouveaux
                        'rgba(108, 117, 125, 0.7)'    // Abandonnés (gris)
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
</body>
</html>

@endsection --}}