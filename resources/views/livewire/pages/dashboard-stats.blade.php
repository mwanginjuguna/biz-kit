<div class="px-4">
    <!-- Stats Section -->
    <div class="py-4">
        <!-- Grid -->
        <div class="grid sm:grid-cols-4 border-y border-slate-200 dark:border-slate-700">
            <!-- orders Card -->
            <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-slate-400 before:first:bg-slate-200 dark:before:bg-slate-800">
                <div>
                    <svg class="w-6 h-6 text-blue-500 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l2-2 2 2 2-2 2 2 2-2 2 2V3l-2 2-2-2-2 2-2-2-2 2-2-2Z"/>
                    </svg>


                    <div class="mt-3">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs uppercase tracking-wide text-slate-600 dark:text-slate-400">
                                {{ __('Total orders') }}
                            </p>
                        </div>
                        <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                            <h3 class="text-xl sm:text-2xl font-semibold text-orange-500 dark:text-orange-400">
                                {{ number_format($ttl = $orders->count(), 0) }}
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End orders total Card -->

            <!-- pending Card -->
            <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-slate-200 before:first:bg-transparent dark:before:bg-slate-800">
                <div>
                    <svg class="flex-shrink-0 size-5 text-blue-500 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>

                    <div class="mt-3">
                        <p class="text-xs uppercase tracking-wide text-slate-600 dark:text-slate-400">
                            {{ __('Pending Orders') }}
                        </p>
                        <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                            <h3 class="text-xl sm:text-2xl font-semibold text-orange-500 dark:text-orange-400">
                                {{ $pnd = $orders->where('status', 'pending')->count() }}
                            </h3>
                            <a class="mt-1 lg:mt-0 min-h-[24px] inline-flex items-center gap-x-1 py-0.5 px-2 text-slate-800 bg-slate-200/70 hover:bg-slate-200 rounded-md dark:bg-slate-700 dark:hover:bg-slate-800 dark:text-slate-200" href="#">
                                <span class="inline-block text-xs font-semibold">
                                    {{ $ttl ? number_format($pnd/$ttl * 100, 1) : 0 }}%
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End pending Card -->

            <!-- Delivered Card -->
            <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-slate-200 before:first:bg-transparent dark:before:bg-slate-800">
                <div>
                    <svg class="w-6 h-6 text-blue-500 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                    </svg>

                    <div class="mt-3">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs uppercase tracking-wide text-slate-600 dark:text-slate-400">
                                {{__('Delivered Orders')}}
                            </p>
                        </div>
                        <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                            <h3 class="text-xl sm:text-2xl font-semibold text-orange-500 dark:text-orange-400">
                                {{ $del = $orders->where('status', 'delivered')->count() }}
                            </h3>
                            <a class="mt-1 lg:mt-0 min-h-[24px] inline-flex items-center gap-x-1 py-0.5 px-2 text-slate-800 bg-slate-200/70 hover:bg-slate-200 rounded-md dark:bg-slate-700 dark:hover:bg-slate-800 dark:text-slate-200" href="#">
                                <span class="inline-block text-xs font-semibold">
                                    {{ $ttl ? number_format($del/$ttl * 100, 1) : 0}}%
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Delivered Card -->

            <!-- Shipping Card -->
            <div class="p-4 md:p-5 relative before:absolute before:top-0 before:start-0 before:w-full before:h-px sm:before:w-px sm:before:h-full before:bg-slate-200 before:first:bg-transparent dark:before:bg-slate-800">
                <div>
                    <svg class="w-6 h-6 text-blue-500 dark:text-blue-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.651 7.65a7.131 7.131 0 0 0-12.68 3.15M18.001 4v4h-4m-7.652 8.35a7.13 7.13 0 0 0 12.68-3.15M6 20v-4h4"/>
                    </svg>

                    <div class="mt-3">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                {{__('Orders on the way')}}
                            </p>
                        </div>
                        <div class="mt-1 lg:flex lg:justify-between lg:items-center">
                            <h3 class="text-xl sm:text-2xl font-semibold text-orange-500 dark:text-orange-400">
                                {{ $shp = $orders->where('status', 'shipping')->count() }}
                            </h3>
                            <a class="mt-1 lg:mt-0 min-h-[24px] inline-flex items-center gap-x-1 py-0.5 px-2 text-slate-800 bg-gray-200/70 hover:bg-slate-200 rounded-md dark:bg-slate-700 dark:hover:bg-slate-800 dark:text-slate-200" href="#">
                                <span class="inline-block text-xs font-semibold">
                                    {{ $ttl ? number_format($shp/$ttl * 100, 1) : 0 }}%
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Shipping Card -->
        </div>
        <!-- End Grid -->
    </div>
    <!-- End Stats Section -->

    <!-- Recent Activity Section -->
    <div class="py-4 mt-3 space-y-3">
        @forelse($orders->take(3) as $order)
            <!-- Card -->
            <a class="group flex flex-col bg-slate-50 border shadow-sm rounded-xl hover:shadow-md transition dark:bg-slate-800 dark:border-slate-700" href="{{ route('orders.show', $order->id) }}">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <div class="ms-3 text-slate-700 dark:text-slate-300">
                                <h3 class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-blue-400 dark:text-neutral-200">
                                    {{ $order->order_number }}
                                </h3>
                                <p class="py-1 text-xs lg:text-sm">Status: {{ $order->status }}</p>
                                <p class="py-1 block md:hidden text-xs lg:text-sm">Amount: <span class="text-orange-500 font-medium">{{ config('app.currency_symbol').' '.number_format($order->total, 2) }}</span></p>
                            </div>
                        </div>

                        <p class="py-1 hidden md:block text-xs lg:text-sm text-slate-700 dark:text-slate-300">Amount: <span class="text-orange-500 font-medium">{{ config('app.currency_symbol').' '.number_format($order->total, 2) }}</span></p>

                        <div class="ps-3 flex flex-row items-center text-xs text-slate-700 dark:text-slate-300 group-hover:text-blue-500 dark:group-hover:text-blue-400">
                            View
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                        </div>
                    </div>
                </div>
            </a>
            <!-- End Card -->
        @empty
            <p class="py-2">No Orders Yet.</p>
        @endforelse
    </div>
</div>
