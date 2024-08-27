<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block bg-dark sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">
                                Dashboard
                            </a>
                        </li>
                        <!-- Add other navigation items here -->
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Revenue</h1>
                </div>

                <div class="row text-white">
                    <div class="col-md-4">
                        <div class="card bg-dark">
                            <div class="card-body">
                                <h5>Total MRR</h5>
                                <h3>${{ number_format($data['total_mrr']) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark">
                            <div class="card-body">
                                <h5>New MRR</h5>
                                <h3>${{ number_format($data['new_mrr']) }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-dark">
                            <div class="card-body">
                                <h5>Upgrades</h5>
                                <h3>${{ number_format($data['upgrades']) }}</h3>
                            </div>
                        </div>
                    </div>
                </div>

                <canvas id="mrrChart" class="my-4 w-100"></canvas>
            </main>
        </div>
    </div>

    <script>
        const labels = @json($data['labels']);
        const mrrData = @json($data['mrr_data']);
        
        const ctx = document.getElementById('mrrChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'New MRR',
                        data: mrrData.new_mrr,
                        backgroundColor: '#FF6384',
                    },
                    {
                        label: 'Upgrades',
                        data: mrrData.upgrades,
                        backgroundColor: '#36A2EB',
                    },
                    {
                        label: 'Reactivations',
                        data: mrrData.reactivations,
                        backgroundColor: '#FFCE56',
                    },
                    {
                        label: 'Existing',
                        data: mrrData.existing,
                        backgroundColor: '#4BC0C0',
                    },
                    {
                        label: 'Downgrades',
                        data: mrrData.downgrades,
                        backgroundColor: '#F7464A',
                    },
                    {
                        label: 'Churn',
                        data: mrrData.churn,
                        backgroundColor: '#949FB1',
                    },
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
