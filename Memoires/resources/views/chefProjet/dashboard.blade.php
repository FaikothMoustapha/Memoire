@extends('layouts.master')
@section('content')
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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
    
    <div class="dashboard-container">
        <!-- Donut Chart -->
        <div class="card">
            <h2>Statuts des projets</h2>
            <canvas id="projectChart" width="400" height="400"></canvas>
        </div>

        <!-- Timeline -->
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
                        <div class="day-number">{{ \Carbon\Carbon::now()->day }}</div>
                        <div class="date-right">
                            <div class="day-name">{{ \Carbon\Carbon::now()->format('l') }}</div>
                            <div class="month">{{ \Carbon\Carbon::now()->format('F Y') }}</div>
                        </div>
                    </div>                                
                </div>
                <ul>
                    @foreach($reunions as $reunion)
                        <li>
                            <div class="bullet bg-green"></div> <!-- tu peux varier la couleur selon besoin -->
                            <div class="time">{{ \Carbon\Carbon::parse($reunion->heure)->format('g A') }}</div>
                            <div class="desc">
                                <h3>{{ $reunion->odreJour }}</h3>
                                <h4>{{ $reunion->lieu }} - {{ \Carbon\Carbon::parse($reunion->dateReunion)->format('d M Y') }}</h4>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>


    
</div>
@endsection