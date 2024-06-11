<div wire:ignore
    class="grid lg:grid-cols-3 gap-6 items-center mt-6 py-6 px-4 bg-slate-50 dark:bg-slate-700 text-slate-800 dark:text-slate-200 rounded-lg">
    <div class="lg:col-span-2">
        <h3 class="py-2 font-bold text-2xl">Sales Overview</h3>

        <!-- sales chart - quarterly / annually / monthly -->
        <div class="p-2">
            <div class="py-2 my-3 flex justify-between items-center text-sm">
                <h3 class="py-2 md:text-base">
                    <span x-text="$wire.year"></span> Revenue: <span class="text-orange-500 dark:text-orange-400 font-bold">{{ config('app.currency_symbol') }} <span x-text="$wire.totalPerYear"></span> </span>
                </h3>

                <div>
                    <select id="select-year"
                            wire:model.live="year"
                            wire:change="updateChart"
                            class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a year</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                    </select>
                </div>
            </div>
            <div class="relative w-full h-full">
                <canvas id="salesChart" x-ref="canvas"></canvas>
            </div>

        </div>
    </div>

    <div class="lg:col-span-1" wire:ignore>

        <div class="grid lg:grid-cols-1 gap-6">
            <!-- Revenue Card -->
            <x-cards.simple-stats-card title="Revenue">
                <x-slot:svg>
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z"/>
                    </svg>

                </x-slot:svg>
                <h3 class="text-xl font-medium text-green-600 dark:text-green-500">
                    {{ config('app.currency_symbol') . ' ' . number_format($revenue, 2) }}
                </h3>
            </x-cards.simple-stats-card>
            <!-- End Card -->

            <!-- Products Card -->
            <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:before:bg-neutral-800" href="#">
                <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
                    <svg class="flex-shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>

                    <div class="grow">
                        <p class="text-xs uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">
                            Products Overview
                        </p>
                        <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-500">
                            {{ $productsCount }}
                        </h3>
                        <div class="mt-1 flex justify-between items-center">
                            <p class="text-sm text-gray-500 dark:text-neutral-500">
                                purchased <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $purchasedProducts }}</span>
                            </p>
                            <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lime-300 text-gray-800 dark:bg-lime-600 dark:text-neutral-200">
                                <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                                </svg>
                                <span class="inline-block">
                                {{ $purchasedProducts ? number_format($purchasedProducts/$productsCount * 100, 1) : 0 }}%
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->

        </div>

        <p class="py-2 font-medium md:text-lg">Top Products/Sales</p>
        <x-parts.top-products :$topProducts />
    </div>

    <!-- total sales -->
    <!-- top products - per week / per month -->

    @script
    <script>
        let orderCountPerMonth = $wire.orderCountPerMonth;
        let months = $wire.months;
        let suggestedMax = $wire.maxChartBarValue;

        const ctx = document.getElementById('salesChart');
        darkMode = JSON.parse(localStorage.getItem('darkMode'));

        let config = {
            type: 'bar',
            data: {
                labels: months,
                datasets: [{
                    label: '# of Orders Per Month',
                    data: orderCountPerMonth,
                    borderWidth: 0,
                    borderColor: darkMode ? '#475569' : '#f5f5f4',
                    backgroundColor: darkMode ? '#fb923c' : '#ea580c',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMin: 1,
                        suggestedMax: suggestedMax
                    }
                },
                plugins: {
                    customCanvasBackgroundColor: {
                        'color': 'lightGreen'
                    }
                }
            },
            plugins: [
                {
                    id: 'customCanvasBackgroundColor',
                    beforeDraw: (chart, args, options) => {
                        const {ctx} = chart;
                        ctx.save();
                        ctx.globalCompositeOperation = 'destination-over';
                        ctx.fillStyle = options.color || '#99ffff';
                        ctx.fillRect(0, 0, chart.width, chart.height);
                        ctx.borderRadius = options.borderRadius || 2
                        ctx.restore();
                    }
                }
            ]
        }

        let salesChart = new Chart(ctx, config);

        Livewire.on('update-sales-chart', () => {
            if (window.salesChart) {
                salesChart.destroy();
            }

            config.data.labels = $wire.months;
            config.data.datasets[0].data = $wire.orderCountPerMonth;
            config.options.scales.y.suggestedMax = suggestedMax;

            salesChart = new Chart(ctx, config)
        });
    </script>
    @endscript
</div>
