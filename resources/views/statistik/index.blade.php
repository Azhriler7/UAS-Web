@extends('dashboard')

@section('title', 'Statistik Pengunjung')

@section('main-content')
    <!-- Page Heading -->
    <h1>Statistik Pengunjung</h1>

    <!-- Chart Containers -->
    <div class="row">
        <!-- Daily Visitors Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="chart-area" style="height: 300px;">
                        <canvas id="dailyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Weekly Visitors Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="chart-area" style="height: 300px;">
                        <canvas id="weeklyChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Prepare Daily Data
        const dailyLabels = {!! $dailyStats->pluck('date') !!};
        const dailyCounts = {!! $dailyStats->pluck('count') !!};

        // Create Daily Chart
        new Chart(document.getElementById('dailyChart'), {
            type: 'bar',
            data: {
                labels: dailyLabels,
                datasets: [{
                    label: 'Daily Visitors',
                    data: dailyCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: { title: { display: true, text: 'Date' } },
                    y: { title: { display: true, text: 'Count' }, beginAtZero: true }
                }
            }
        });

        // Prepare Weekly Data
        const weeklyLabels = {!! $weeklyStats->pluck('week') !!};
        const weeklyCounts = {!! $weeklyStats->pluck('count') !!};

        // Create Weekly Chart
        new Chart(document.getElementById('weeklyChart'), {
            type: 'line',
            data: {
                labels: weeklyLabels,
                datasets: [{
                    label: 'Weekly Visitors',
                    data: weeklyCounts,
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: false
                }]
            },
            options: {
                scales: {
                    x: { title: { display: true, text: 'Week' } },
                    y: { title: { display: true, text: 'Count' }, beginAtZero: true }
                }
            }
        });
    </script>
@endsection