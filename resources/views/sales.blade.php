@extends('layouts.app')

@section('title', 'Dashboard Penjualan')

@section('content')
    <div class="container">
        <h1 class="my-4 text-center">Dashboard Penjualan</h1>

        <!-- Grafik Penjualan -->
        <div class="row mb-5">
            <div class="col-md-8 offset-md-2">
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Analisis Keuangan -->
        <div class="row">
            <div class="col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendapatan Cash</h5>
                        <p class="card-text">
                            Rp {{ number_format($totalPendapatanCash, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendapatan Kredit</h5>
                        <p class="card-text">
                            Rp {{ number_format($totalPendapatanKredit, 0, ',', '.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($labels) !!},
                datasets: [{
                        label: 'Penjualan Cash',
                        data: {!! json_encode($cashSales) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                    },
                    {
                        label: 'Penjualan Kredit',
                        data: {!! json_encode($kreditSales) !!},
                        backgroundColor: 'rgba(153, 102, 255, 0.5)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 1,
                    }
                ]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        enabled: true,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
