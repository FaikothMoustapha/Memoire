@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row clearfix">
        {{-- Utilisateurs --}}
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Utilisateurs</h6>
                            <h2>120</h2> {{-- nombre fictif --}}
                        </div>
                        <div class="icon">
                            <i class="fas fa-users fa-2x" style="color: #007bff;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-primary" style="width: 100%;"></div>
                </div>
            </div>
        </div>

        {{-- Programmes --}}
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Programmes</h6>
                            <h2>15</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tasks fa-2x" style="color: #28a745;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-success" style="width: 100%;"></div>
                </div>
            </div>
        </div>

        {{-- Structures --}}
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Structures</h6>
                            <h2>30</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-building fa-2x" style="color: #ffc107;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-warning" style="width: 100%;"></div>
                </div>
            </div>
        </div>

        {{-- Catégories --}}
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="widget">
                <div class="widget-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="state">
                            <h6>Total Catégories</h6>
                            <h2>8</h2>
                        </div>
                        <div class="icon">
                            <i class="fas fa-tags fa-2x" style="color: #dc3545;"></i>
                        </div>
                    </div>
                </div>
                <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" style="width: 100%;"></div>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-4">

        {{-- Carte Météo --}}
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 text-center p-4" style="background: linear-gradient(135deg, #007bff 0%, #00c6ff 100%); color: white;">
                <div class="mb-3">
                    <i class="fas fa-cloud-sun fa-4x"></i>
                </div>
                <h4>Abidjan</h4>
                <h2>28°C</h2>
                <p>Ensoleillé avec quelques nuages</p>
                <small>Mis à jour à 10:30 AM</small>
            </div>
        </div>
    
        {{-- Carte Citation du jour --}}
        <div class="col-md-4 col-sm-6 mb-4">
            <div class="card shadow-sm border-0 p-4 d-flex flex-column justify-content-center" style="background: #f8f9fa; color: #333;">
                <h4 class="text-center mb-3" style="color: #007bff;">Citation du jour</h4>
                <p class="text-center fst-italic">"La réussite appartient à ceux qui osent."</p>
                <p class="text-center fw-bold mb-0">- Anonyme</p>
            </div>
        </div>
    
        {{-- Carte Statistiques Utilisateurs --}}
        <div class="col-md-4 col-sm-12 mb-4">
            <div class="card shadow-sm border-0 p-4" style="background: #ffffff; color: #333;">
                <h4 class="text-center mb-4" style="color: #007bff;">Statistiques Utilisateurs</h4>
                <div class="d-flex justify-content-between mb-3">
                    <div>
                        <h6>Total</h6>
                        <h3>150</h3>
                    </div>
                    <div>
                        <h6>Actifs</h6>
                        <h3>120</h3>
                    </div>
                    <div>
                        <h6>Inactifs</h6>
                        <h3>30</h3>
                    </div>
                </div>
                <div class="progress" style="height: 6px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 80%;"></div>
                </div>
            </div>
        </div>
    
    </div>
    

    {{-- Paramètres généraux - section plus large pour gérer les entités --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>Paramètres Généraux</h3>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        {{-- Programme --}}
                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="text-decoration-none">
                                <div class="card shadow-sm border-0 text-center p-4 h-100" style="transition: transform 0.3s ease;">
                                    <div class="mb-3">
                                        <i class="fas fa-tasks fa-3x text-primary"></i>
                                    </div>
                                    <h5 class="text-primary">Programmes</h5>
                                    <p class="text-muted small">Gérer les programmes</p>
                                </div>
                            </a>
                        </div>
    
                        {{-- Structures --}}
                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="text-decoration-none">
                                <div class="card shadow-sm border-0 text-center p-4 h-100" style="transition: transform 0.3s ease;">
                                    <div class="mb-3">
                                        <i class="fas fa-building fa-3x text-success"></i>
                                    </div>
                                    <h5 class="text-success">Structures</h5>
                                    <p class="text-muted small">Gérer les structures</p>
                                </div>
                            </a>
                        </div>
    
                        {{-- Catégories --}}
                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="text-decoration-none">
                                <div class="card shadow-sm border-0 text-center p-4 h-100" style="transition: transform 0.3s ease;">
                                    <div class="mb-3">
                                        <i class="fas fa-tags fa-3x text-warning"></i>
                                    </div>
                                    <h5 class="text-warning">Catégories</h5>
                                    <p class="text-muted small">Gérer les catégories</p>
                                </div>
                            </a>
                        </div>
    
                        {{-- Étapes --}}
                        <div class="col-md-3 col-sm-6">
                            <a href="#" class="text-decoration-none">
                                <div class="card shadow-sm border-0 text-center p-4 h-100" style="transition: transform 0.3s ease;">
                                    <div class="mb-3">
                                        <i class="fas fa-layer-group fa-3x text-danger"></i>
                                    </div>
                                    <h5 class="text-danger">Étapes</h5>
                                    <p class="text-muted small">Gérer les étapes</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Ajout d’un petit effet hover --}}
    <style>
        a.text-decoration-none:hover .card {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
    </style>
    
</div>
@endsection
