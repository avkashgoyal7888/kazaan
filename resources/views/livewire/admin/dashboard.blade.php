@push('css')
    <title>Dashboard</title>
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 30px;
            box-shadow: 0 10px 40px rgba(102, 126, 234, 0.4);
        }
        
        .dashboard-heading {
            color: white;
            font-size: 3rem;
            font-weight: 800;
            margin: 0;
            text-shadow: 2px 2px 10px rgba(0,0,0,0.2);
        }
        
        .welcome-text {
            color: rgba(255,255,255,0.95);
            font-size: 1.2rem;
            margin-top: 10px;
        }
    </style>
@endpush

<div>
    <!-- Modern Header -->
    <div class="gradient-bg">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h1 class="dashboard-heading">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </h1>
                <p class="welcome-text mb-0">Welcome back! Here's your overview</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card border-primary">
                <div class="card-body">
                    <h5 class="card-title text-primary">Total Bookings</h5>
                    <h2 class="card-text">{{ number_format($totalBookings) }}</h2>
                    <p class="card-text text-muted">
                        <i class="bi bi-calendar-check"></i> All time bookings
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card border-success">
                <div class="card-body">
                    <h5 class="card-title text-success">Total Payments</h5>
                    <h2 class="card-text">₹{{ number_format($totalPaymentAmount, 2) }}</h2>
                    <p class="card-text text-muted">
                        <i class="bi bi-currency-rupee"></i> {{ number_format($totalPayments) }} transactions
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card border-info">
                <div class="card-body">
                    <h5 class="card-title text-info">Total Resorts</h5>
                    <h2 class="card-text">{{ number_format($totalResorts) }}</h2>
                    <p class="card-text text-muted">
                        <i class="bi bi-building"></i> Active resorts
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card border-warning">
                <div class="card-body">
                    <h5 class="card-title text-warning">Total Blogs</h5>
                    <h2 class="card-text">{{ number_format($totalBlogs) }}</h2>
                    <p class="card-text text-muted">
                        <i class="bi bi-file-text"></i> Published blogs
                    </p>
                </div>
            </div>
        </div>
        
        <div class="col-md-4 mb-3">
            <div class="card border-danger">
                <div class="card-body">
                    <h5 class="card-title text-danger">Contact Requests</h5>
                    <h2 class="card-text">{{ number_format($totalContactUs) }}</h2>
                    <p class="card-text text-muted">
                        <i class="bi bi-envelope"></i> Total inquiries
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Charts -->
    <div class="row mb-4">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Monthly Bookings ({{ date('Y') }})</h5>
                </div>
                <div class="card-body">
                    <div style="height: 400px;">
                        <canvas id="monthlyBookingChart" wire:ignore></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Payment Charts -->
    <div class="row mb-4">
        <div class="col-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Monthly Payments ({{ date('Y') }})</h5>
                </div>
                <div class="card-body">
                    <div style="height: 400px;">
                        <canvas id="monthlyPaymentChart" wire:ignore></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('livewire:navigated', function () {
        initializeCharts();
    });

    function initializeCharts() {
        // Destroy existing charts if they exist
        if (window.monthlyBookingChart instanceof Chart) {
            window.monthlyBookingChart.destroy();
        }
        if (window.monthlyPaymentChart instanceof Chart) {
            window.monthlyPaymentChart.destroy();
        }

        // Monthly Booking Chart
        const monthlyBookingCtx = document.getElementById('monthlyBookingChart');
        if (monthlyBookingCtx) {
            window.monthlyBookingChart = new Chart(monthlyBookingCtx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Bookings',
                        data: @json($monthlyBookingData),
                        borderColor: 'rgb(75, 192, 192)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 100,
                                callback: function(value) {
                                    return Number.isInteger(value) ? value : '';
                                }
                            }
                        }
                    }
                }
            });
        }

        // Monthly Payment Chart
        const monthlyPaymentCtx = document.getElementById('monthlyPaymentChart');
        if (monthlyPaymentCtx) {
            window.monthlyPaymentChart = new Chart(monthlyPaymentCtx.getContext('2d'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Payment Amount (₹)',
                        data: @json($monthlyPaymentData),
                        borderColor: 'rgb(255, 99, 132)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '₹' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });
        }
    }

    // Initialize charts on first load
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initializeCharts);
    } else {
        initializeCharts();
    }
</script>
@endpush