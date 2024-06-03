<x-app-layout>
    <x-slot:title>
        Admin Products List
    </x-slot:title>

    <section class="max-w-7xl mx-auto px-4 py-8 md:py-12 lg:py-20">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-100 sm:text-4xl">Browse Products</h2>
            <p class="mt-2 text-lg leading-8 text-slate-600 dark:text-slate-300">View all products.</p>
        </div>

        <!-- Stats Section -->
        <div class="py-14">
            <!-- Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <!-- products overview -->
                <div class="flex flex-col bg-white border border-blue-100 shadow-sm rounded-xl dark:bg-slate-800 dark:border-blue-800">
                    <div class="p-4 md:p-5 flex justify-between gap-x-3">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                Total products
                            </p>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl sm:text-2xl font-medium text-orange-500 dark:text-orange-400">
                                    {{ $products->count() }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.583 8.445h.01M10.86 19.71l-6.573-6.63a.993.993 0 0 1 0-1.4l7.329-7.394A.98.98 0 0 1 12.31 4l5.734.007A1.968 1.968 0 0 1 20 5.983v5.5a.992.992 0 0 1-.316.727l-7.44 7.5a.974.974 0 0 1-1.384.001Z"/>
                            </svg>
                        </div>
                    </div>

                    <!--<a class="py-3 px-4 md:px-5 inline-flex justify-between items-center text-sm text-gray-600 border-t border-gray-200 hover:bg-gray-50 rounded-b-xl dark:border-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-800" href="#">
                        Browse All Products
                        <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
                    </a>-->
                </div>
                <!-- End overview -->

                <!-- purchased products overview -->
                <div class="flex flex-col bg-white border shadow-sm border-blue-100 rounded-xl dark:bg-slate-800 dark:border-blue-800">
                    <div class="p-4 md:p-5 flex justify-between gap-x-3">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                Purchased products
                            </p>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl sm:text-2xl font-medium text-orange-500 dark:text-orange-400">
                                    {{ $purchasedProducts }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10V6a3 3 0 0 1 3-3v0a3 3 0 0 1 3 3v4m3-2 .917 11.923A1 1 0 0 1 17.92 21H6.08a1 1 0 0 1-.997-1.077L6 8h12Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- End purchased -->

                <!-- Product brands Card -->
                <div class="flex flex-col bg-white border border-blue-100 shadow-sm rounded-xl dark:bg-slate-800 dark:border-blue-800">
                    <div class="p-4 md:p-5 flex justify-between gap-x-3">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                Brands
                            </p>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="mt-1 text-xl font-medium text-orange-500 dark:text-orange-400">
                                    {{ $products->unique('brand')->count() }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.2 6H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11.2a1 1 0 0 0 .747-.334l4.46-5a1 1 0 0 0 0-1.332l-4.46-5A1 1 0 0 0 15.2 6Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- End brand -->

                <!-- Product Categories Card -->
                <div class="flex flex-col bg-white border border-blue-100 shadow-sm rounded-xl dark:bg-slate-800 dark:border-blue-800">
                    <div class="p-4 md:p-5 flex justify-between gap-x-3">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                Product Categories
                            </p>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="text-xl sm:text-2xl font-medium text-orange-500 dark:text-orange-400">
                                    {{ $cats = $products->unique('category')->count() }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">
                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.143 4H4.857A.857.857 0 0 0 4 4.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 10 9.143V4.857A.857.857 0 0 0 9.143 4Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286A.857.857 0 0 0 20 9.143V4.857A.857.857 0 0 0 19.143 4Zm-10 10H4.857a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286A.857.857 0 0 0 9.143 14Zm10 0h-4.286a.857.857 0 0 0-.857.857v4.286c0 .473.384.857.857.857h4.286a.857.857 0 0 0 .857-.857v-4.286a.857.857 0 0 0-.857-.857Z"/>
                            </svg>

                        </div>
                    </div>
                </div>
                <!-- End Categories -->

                <!-- Product Views Card -->
                <div class="flex flex-col bg-white border border-blue-100 shadow-sm rounded-xl dark:bg-slate-800 dark:border-blue-800">
                    <div class="p-4 md:p-5 flex justify-between gap-x-3">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                Product Views
                            </p>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="mt-1 text-xl font-medium text-orange-500 dark:text-orange-400">
                                    {{ number_format($products->sum('views'), 0) }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">
                            <svg class="flex-shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"/><path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/></svg>
                        </div>
                    </div>
                </div>
                <!-- End views -->

                <!-- Inventory Card -->
                <div class="flex flex-col bg-white border border-blue-100 shadow-sm rounded-xl dark:bg-slate-800 dark:border-blue-800">
                    <div class="p-4 md:p-5 flex justify-between gap-x-3">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-slate-500 dark:text-slate-400">
                                Out of Stocked
                            </p>
                            <div class="mt-1 flex items-center gap-x-2">
                                <h3 class="mt-1 text-xl font-medium text-orange-500 dark:text-orange-400">
                                    {{ number_format($products->where('stock_quantity', 0)->count(), 0) }}
                                </h3>
                            </div>
                        </div>
                        <div class="flex-shrink-0 flex justify-center items-center size-[46px] bg-blue-600 text-white rounded-full dark:bg-blue-900 dark:text-blue-200">
                            <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.5 4h-13m13 16h-13M8 20v-3.333a2 2 0 0 1 .4-1.2L10 12.6a1 1 0 0 0 0-1.2L8.4 8.533a2 2 0 0 1-.4-1.2V4h8v3.333a2 2 0 0 1-.4 1.2L13.957 11.4a1 1 0 0 0 0 1.2l1.643 2.867a2 2 0 0 1 .4 1.2V20H8Z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <!-- End Inventory -->
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Section -->

        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-5 gap-y-10 border-t border-slate-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-5">
            @foreach($products as $product)
                <x-cards.product-card :product="$product" />
            @endforeach
        </div>
    </section>
</x-app-layout>
