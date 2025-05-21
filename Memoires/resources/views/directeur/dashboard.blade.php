@extends('layouts.master')
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

@endsection