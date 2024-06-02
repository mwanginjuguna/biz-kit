@props([
    'labels',
    'data',
    'dataTitle' => '# of Items',
])
<div>
    <canvas id="myChart"></canvas>

    @push('scripts')
        <script>
            const ctx = document.getElementById('myChart');

            darkMode = JSON.parse(localStorage.getItem('darkMode'));

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($dataTitle) ?>,
                    datasets: [{
                        label: '# of Orders Per Month',
                        data: <?php echo json_encode($data) ?>,
                        borderWidth: 0,
                        borderColor: darkMode ? '#475569' : '#94a3b8',
                        backgroundColor: darkMode ? '#fb923c' : '#ea580c',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            suggestedMin: 1,
                            suggestedMax: 10,

                        }
                    }
                }
            });
        </script>
    @endpush
</div>
