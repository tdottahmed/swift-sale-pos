<x-layouts.master>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Dailay Sales Report</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <x-data-display.card-toolbar />
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h5 class="card-title">Daily Sales chart</h5>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                    <a class="list-icons-item" data-action="reload"></a>
                                    <a class="list-icons-item" data-action="remove"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="chart-container">
                                <canvas id="salesChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @push('css')
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            @endpush

            @push('scripts')
                <script>
                    var ctx = document.getElementById('salesChart').getContext('2d');
                    var salesChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: @json($dates),
                            datasets: [{
                                label: 'Daily Sales',
                                data: @json($totals),
                                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                borderColor: 'rgba(54, 162, 235, 1)',
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                </script>
            @endpush

        </div>
    </div>
</x-layouts.master>
