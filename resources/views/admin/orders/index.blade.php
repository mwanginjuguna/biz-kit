<x-app-layout>
    <x-slot:title>All Orders - Admin.</x-slot:title>

    <div class="max-w-6xl mx-auto px-4 py-10 md:py-16">
        <h1 class="py-2 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            <span class="text-blue-600 dark:text-blue-500">All Orders</span>.
        </h1>


        <!-- Stats Section -->
        <div class="py-10">
            <!-- Grid -->
            <div class="grid lg:grid-cols-3 border border-slate-200 shadow-sm rounded-xl overflow-hidden dark:border-slate-800">
                <!-- Orders Card -->
                <div class="block p-4 md:p-5 relative bg-orange-200 hover:bg-orange-100 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-orange-800 dark:hover:bg-orange-900 dark:before:bg-orange-800">
                    <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
                        <svg class="w-6 h-6 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 8h6m-6 4h6m-6 4h6M6 3v18l2-2 2 2 2-2 2 2 2-2 2 2V3l-2 2-2-2-2 2-2-2-2 2-2-2Z"/>
                        </svg>

                        <div class="grow">
                            <p class="text-xs uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">
                                Total Orders
                            </p>
                            <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-400">
                                {{ $all = $orders->count() }}
                            </h3>
                            <div class="mt-1 flex justify-between items-center">
                                <p class="text-xs text-slate-600 dark:text-slate-300">
                                    paid: <span class="text-sm font-medium text-green-600 dark:text-green-400">{{ $paid = $orders->where('is_paid')->count() }}</span>
                                </p>
                                <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lime-300 text-slate-800 dark:bg-lime-600 dark:text-slate-100">
                                    <span class="inline-block">{{ $paid ? number_format($paid/$all * 100, 2) : 0 }}%</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Customers Card -->
                <div class="block p-4 md:p-5 relative bg-orange-200 hover:bg-orange-100 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-orange-800 dark:hover:bg-orange-900 dark:before:bg-orange-800">
                    <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
                        <svg class="w-6 h-6 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M4.5 17H4a1 1 0 0 1-1-1 3 3 0 0 1 3-3h1m0-3.05A2.5 2.5 0 1 1 9 5.5M19.5 17h.5a1 1 0 0 0 1-1 3 3 0 0 0-3-3h-1m0-3.05a2.5 2.5 0 1 0-2-4.45m.5 13.5h-7a1 1 0 0 1-1-1 3 3 0 0 1 3-3h3a3 3 0 0 1 3 3 1 1 0 0 1-1 1Zm-1-9.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0Z"/>
                        </svg>

                        <div class="grow">
                            <p class="text-xs uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">
                                Customers
                            </p>
                            <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-400">
                                {{ $customers }}
                            </h3>
                            <div class="mt-1 flex justify-between items-center">
                                <p class="text-xs text-slate-600 dark:text-slate-300">
                                    All users: <span class="text-sm font-medium text-green-600 dark:text-green-400">{{ $users }}</span>
                                </p>
                                <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lime-300 text-slate-800 dark:bg-lime-600 dark:text-slate-100">
                                    <span class="inline-block">{{ $customers > 0 ? number_format($customers/$users * 100, 2) : 0 }}%</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->

                <!-- Sales Card -->
                <div class="block p-4 md:p-5 relative bg-orange-200 hover:bg-orange-100 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-orange-800 dark:hover:bg-orange-900 dark:before:bg-orange-800">
                    <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
                        <svg class="w-6 h-6 text-orange-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z"/>
                        </svg>

                        <div class="grow">
                            <p class="text-xs uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">
                                Sales
                            </p>
                            <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-400">
                                {{ config('app.currency_symbol'). ' '. number_format($orders->sum('total'), 2) }}
                            </h3>
                            <div class="mt-1 flex justify-between items-center">
                                <p class="text-xs text-slate-600 dark:text-slate-300">
                                    Sold products: <span class="text-sm font-medium text-green-600 dark:text-green-400">{{ $purchasedProducts }}</span>
                                </p>
                                <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lime-300 text-slate-800 dark:bg-lime-600 dark:text-slate-100">
                                    <span class="inline-block">{{ $purchasedProducts ? number_format($purchasedProducts/$products * 100, 2) : 0 }}%</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Card -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Stats Section -->

        <livewire:orders.index />
    </div>
</x-app-layout>
