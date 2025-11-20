@push('css')
    <title>Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #6366f1;
            --secondary: #8b5cf6;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #06b6d4;
        }

        .dashboard-container {
            padding: 2rem 1rem;
        }
        .dark-mode .dashboard-container {
            background-color: #212529;
            color: #f8f9fa;
        }
        .header-section {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 20px;
            padding: 3rem 2rem;
            margin-bottom: 2.5rem;
            color: white;
            box-shadow: 0 20px 60px rgba(99, 102, 241, 0.3);
            position: relative;
            overflow: hidden;
        }

        .dark-mode .header-section {
            background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
            box-shadow: 0 20px 60px rgba(79, 70, 229, 0.4);
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(20px); }
        }

        .header-content {
            position: relative;
            z-index: 1;
        }

        .header-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .header-subtitle {
            font-size: 1.1rem;
            opacity: 0.95;
            margin: 0;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.8rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-top: 4px solid transparent;
            position: relative;
            overflow: hidden;
        }

        .dark-mode .stat-card {
            background-color: #343a40;
            color: #f8f9fa;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }

        .stat-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .dark-mode .stat-card:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        .stat-card.primary { border-top-color: var(--primary); }
        .stat-card.success { border-top-color: var(--success); }
        .stat-card.info { border-top-color: var(--info); }
        .stat-card.warning { border-top-color: var(--warning); }
        .stat-card.danger { border-top-color: var(--danger); }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            margin-bottom: 1rem;
            background: rgba(99, 102, 241, 0.1);
        }

        .dark-mode .stat-icon {
            background: rgba(99, 102, 241, 0.2);
        }

        .stat-card.success .stat-icon { background: rgba(16, 185, 129, 0.1); }
        .dark-mode .stat-card.success .stat-icon { background: rgba(16, 185, 129, 0.2); }

        .stat-card.info .stat-icon { background: rgba(6, 182, 212, 0.1); }
        .dark-mode .stat-card.info .stat-icon { background: rgba(6, 182, 212, 0.2); }

        .stat-card.warning .stat-icon { background: rgba(245, 158, 11, 0.1); }
        .dark-mode .stat-card.warning .stat-icon { background: rgba(245, 158, 11, 0.2); }

        .stat-card.danger .stat-icon { background: rgba(239, 68, 68, 0.1); }
        .dark-mode .stat-card.danger .stat-icon { background: rgba(239, 68, 68, 0.2); }

        .stat-label {
            font-size: 0.95rem;
            color: #6b7280;
            font-weight: 500;
            margin-bottom: 0.5rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .dark-mode .stat-label {
            color: #e0e0e0 !important;
        }

        .stat-value {
            font-size: 2.2rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 0.5rem;
        }

        .dark-mode .stat-value {
            color: #f8f9fa;
        }

        .stat-subtitle {
            font-size: 0.85rem;
            color: #9ca3af;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dark-mode .stat-subtitle {
            color: #adb5bd;
        }

        .charts-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        .chart-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .dark-mode .chart-card {
            background-color: #343a40;
            color: #f8f9fa;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.3);
        }

        .chart-card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
        }

        .dark-mode .chart-card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f3f4f6;
        }

        .dark-mode .chart-header {
            border-bottom-color: #495057;
        }

        .chart-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #111827;
            margin: 0;
        }

        .dark-mode .chart-title {
            color: #f8f9fa;
        }

        .chart-year {
            color: #9ca3af;
        }

        .dark-mode .chart-year {
            color: #adb5bd !important;
        }

        .chart-container {
            position: relative;
            height: 350px;
            width: 100%;
        }

        @media (max-width: 1024px) {
            .charts-section {
                grid-template-columns: 1fr;
            }

            .header-title {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .dashboard-container {
                padding: 1rem 0.5rem;
            }

            .header-section {
                padding: 2rem 1.5rem;
                margin-bottom: 2rem;
            }

            .header-title {
                font-size: 1.6rem;
                gap: 0.5rem;
            }

            .header-subtitle {
                font-size: 0.95rem;
            }

            .stats-grid {
                gap: 1rem;
                grid-template-columns: 1fr;
            }

            .stat-card {
                padding: 1.5rem;
            }

            .stat-value {
                font-size: 1.8rem;
            }

            .charts-section {
                grid-template-columns: 1fr;
                gap: 1.5rem;
                padding: 0 0.5rem;
            }

            .chart-card {
                padding: 1.5rem;
                width: 100%;
                max-width: 100%;
            }

            .chart-container {
                height: 300px;
                width: 100%;
            }
        }

        @media (max-width: 480px) {
            .header-title {
                font-size: 1.3rem;
            }

            .stat-value {
                font-size: 1.5rem;
            }

            .chart-container {
                height: 250px;
                width: 100%;
            }

            .stat-icon {
                width: 50px;
                height: 50px;
                font-size: 1.5rem;
            }

            .stat-card {
                padding: 1.2rem;
            }

            .chart-card {
                padding: 1rem;
            }

            .chart-title {
                font-size: 1rem;
            }
        }

        .skeleton {
            background: linear-gradient(90deg, #f3f4f6 25%, #e5e7eb 50%, #f3f4f6 75%);
            background-size: 200% 100%;
            animation: loading 2s infinite;
        }

        @keyframes loading {
            0% { background-position: 200% 0; }
            100% { background-position: -200% 0; }
        }
    </style>
@endpush

<div class="dashboard-container">
    <div class="header-section">
        <div class="header-content">
            <h1 class="header-title">
                <i class="bi bi-speedometer2"></i>
                Dashboard
            </h1>
            <p class="header-subtitle">Welcome back! Here's your performance overview</p>
        </div>
    </div>
    <div class="stats-grid">
        <div class="stat-card primary">
            <div class="stat-icon">
                <i class="bi bi-calendar-check" style="color: var(--primary);"></i>
            </div>
            <p class="stat-label">Total Bookings</p>
            <h2 class="stat-value">{{ number_format($totalBookings) }}</h2>
            <p class="stat-subtitle">
                <i class="bi bi-arrow-up-right"></i> All time bookings
            </p>
        </div>
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="bi bi-currency-rupee" style="color: var(--success);"></i>
            </div>
            <p class="stat-label">Total Payments</p>
            <h2 class="stat-value">₹{{ number_format($totalPaymentAmount, 0) }}</h2>
            <p class="stat-subtitle">
                <i class="bi bi-arrow-up-right"></i> {{ number_format($totalPayments) }} transactions
            </p>
        </div>
        <div class="stat-card info">
            <div class="stat-icon">
                <i class="bi bi-building" style="color: var(--info);"></i>
            </div>
            <p class="stat-label">Total Resorts</p>
            <h2 class="stat-value">{{ number_format($totalResorts) }}</h2>
            <p class="stat-subtitle">
                <i class="bi bi-arrow-up-right"></i> Active resorts
            </p>
        </div>
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="bi bi-file-text" style="color: var(--warning);"></i>
            </div>
            <p class="stat-label">Total Blogs</p>
            <h2 class="stat-value">{{ number_format($totalBlogs) }}</h2>
            <p class="stat-subtitle">
                <i class="bi bi-arrow-up-right"></i> Published blogs
            </p>
        </div>
        <div class="stat-card danger">
            <div class="stat-icon">
                <i class="bi bi-envelope" style="color: var(--danger);"></i>
            </div>
            <p class="stat-label">Contact Requests</p>
            <h2 class="stat-value">{{ number_format($totalContactUs) }}</h2>
            <p class="stat-subtitle">
                <i class="bi bi-arrow-up-right"></i> Total inquiries
            </p>
        </div>
    </div>
    <div class="charts-section">
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="bi bi-graph-up me-2"></i> Monthly Bookings
                </h3>
                <span class="chart-year" style="font-size: 0.85rem;">{{ date('Y') }}</span>
            </div>
            <div class="chart-container">
                <canvas id="monthlyBookingChart" wire:ignore></canvas>
            </div>
        </div>
        <div class="chart-card">
            <div class="chart-header">
                <h3 class="chart-title">
                    <i class="bi bi-cash-flow me-2"></i> Monthly Revenue
                </h3>
                <span class="chart-year" style="font-size: 0.85rem;">{{ date('Y') }}</span>
            </div>
            <div class="chart-container">
                <canvas id="monthlyPaymentChart" wire:ignore></canvas>
            </div>
        </div>
    </div>
</div>

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
    let bookingChart = null;
    let paymentChart = null;

    document.addEventListener('livewire:navigated', initializeCharts);

    function initializeCharts() {
        destroyCharts();
        createCharts();
    }

    function destroyCharts() {
        if (bookingChart) bookingChart.destroy();
        if (paymentChart) paymentChart.destroy();
    }

    function getChartColors() {
        const isDarkMode = document.body.classList.contains('dark-mode');
        return {
            textColor: isDarkMode ? '#adb5bd' : '#6b7280',
            gridColor: isDarkMode ? '#495057' : '#f3f4f6',
            labelColor: isDarkMode ? '#f8f9fa' : '#111827'
        };
    }

    function createCharts() {
        const bookingCtx = document.getElementById('monthlyBookingChart');
        const paymentCtx = document.getElementById('monthlyPaymentChart');
        const colors = getChartColors();

        const chartDefaults = {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        font: { size: 12, weight: '600' },
                        color: colors.textColor,
                        padding: 15,
                        usePointStyle: true
                    }
                }
            }
        };

        if (bookingCtx) {
            bookingChart = new Chart(bookingCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Bookings',
                        data: @json($monthlyBookingData),
                        borderColor: '#6366f1',
                        backgroundColor: 'rgba(99, 102, 241, 0.1)',
                        borderWidth: 3,
                        tension: 0.5,
                        fill: true,
                        pointRadius: 5,
                        pointBackgroundColor: '#6366f1',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    ...chartDefaults,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: colors.gridColor },
                            ticks: {
                                font: { size: 11 },
                                color: colors.textColor
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 11 },
                                color: colors.textColor
                            }
                        }
                    }
                }
            });
        }

        if (paymentCtx) {
            paymentChart = new Chart(paymentCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Revenue (₹)',
                        data: @json($monthlyPaymentData),
                        borderColor: '#10b981',
                        backgroundColor: 'rgba(16, 185, 129, 0.1)',
                        borderWidth: 3,
                        tension: 0.5,
                        fill: true,
                        pointRadius: 5,
                        pointBackgroundColor: '#10b981',
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointHoverRadius: 7
                    }]
                },
                options: {
                    ...chartDefaults,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: { color: colors.gridColor },
                            ticks: {
                                font: { size: 11 },
                                color: colors.textColor,
                                callback: function(value) {
                                    return '₹' + value.toLocaleString('en-IN');
                                }
                            }
                        },
                        x: {
                            grid: { display: false },
                            ticks: {
                                font: { size: 11 },
                                color: colors.textColor
                            }
                        }
                    }
                }
            });
        }
    }

    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.attributeName === 'class') {
                if (document.body.classList.contains('dark-mode') || !document.body.classList.contains('dark-mode')) {
                    initializeCharts();
                }
            }
        });
    });

    observer.observe(document.body, { attributes: true });

    if (document.readyState !== 'loading') {
        initializeCharts();
    }
</script>
@endpush