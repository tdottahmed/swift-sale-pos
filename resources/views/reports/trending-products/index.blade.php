<x-layouts.master>
    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Profit or loss</h6>
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
            <canvas id="trendingProductsChart" width="400" height="200"></canvas>
        </div>
    </div>
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            var ctx = document.getElementById('trendingProductsChart').getContext('2d');
            var trendingProductsChart = new Chart(ctx, {
                type: 'bar', // You can use 'bar', 'line', 'pie', 'doughnut', etc.
                data: {
                    labels: @json($productNames),
                    datasets: [{
                        label: 'Total Sold',
                        data: @json($totalSold),
                        backgroundColor: 'rgba(54, 162, 235, 0.2)', // Light blue
                        borderColor: 'rgba(54, 162, 235, 1)', // Darker blue
                        borderWidth: 1
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
</x-layouts.master>
