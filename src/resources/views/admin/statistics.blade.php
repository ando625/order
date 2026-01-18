@extends('layouts.adminApp')

@section('css')
<link rel="stylesheet" href="{{ asset('css/statistics.css') }}">
@endsection

@section('content')
<div class="admin-statistics-container">
    <h1 class="page-title">売上統計分析</h1>
    
    <div class="graph-card">
        <h2 class="graph-title">月別売上推移</h2>
        <div class="graph-container">
            <canvas id="salesChart"></canvas>
        </div>
    </div>

    <div class="stats-summary">
        <div class="summary-item">
            <span class="summary-label">今月の総売上</span>
            <span class="summary-value font-en">¥{{ number_format(count($salesData) > 0 ? end($salesData) : 0) }}</span>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // ページが完全に読み込まれてから実行する
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('salesChart');
        if (!ctx) return;

        // PHPから渡されたデータが空でないか確認（デバッグ用）
        const labels = @json($labels);
        const dataValues = @json($salesData);
        
        console.log('Labels:', labels); // ブラウザのコンソールで中身が見れます
        console.log('Data:', dataValues);

        new Chart(ctx.getContext('2d'), {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: '売上高',
                    data: dataValues,
                    borderColor: '#e5c158',
                    backgroundColor: 'rgba(229, 193, 88, 0.1)',
                    borderWidth: 3,
                    tension: 0.4,
                    pointBackgroundColor: '#e5c158',
                    pointBorderColor: '#1a1510',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true, // 0から表示させる
                        grid: { color: 'rgba(191, 163, 138, 0.1)' },
                        ticks: { 
                            color: '#bfa38a',
                            callback: function(value) { return '¥' + value.toLocaleString(); }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: { color: '#bfa38a' }
                    }
                }
            }
        });
    });
</script>
@endsection