<div class="grid md:grid-cols-3 py-6 md:py-14">
    <div class="md:col-span-2">
        <h3 class="py-2 font-bold text-2xl">Sales Overview</h3>

        <!-- sales chart - quarterly / annually / monthly -->
        <div class="max-w-xl mx-auto px-4 py-8 bg-slate-50 dark:bg-slate-700 rounded-lg">
            <canvas id="myChart"></canvas>
        </div>
    </div>

    <div class="md:col-span-1">
        <p class="py-2 font-medium md:text-lg">Top Products/Sales</p>
    </div>

    <!-- total sales -->
    <!-- top products - per week / per month -->


    @script
    <script>
        const ctx = document.getElementById('myChart');

        darkMode = JSON.parse(localStorage.getItem('darkMode'));

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: '# of Sales',
                    data: [12000, 1900, 2300, 1500, 2000, 3050, 10000, 4500, 7500, 8000, 14000, 23000],
                    borderWidth: 1,
                    backgroundColor: darkMode ? '#DDDDDD' : '',
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
    @endscript
</div>
