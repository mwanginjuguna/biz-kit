@props([
    'users', 'orders', 'products', 'contactMessages', 'posts'
])

<!-- Card Section -->
<div class="max-w-6xl py-6 mx-auto">
    <!-- Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-4 border border-slate-200 shadow-sm rounded-xl overflow-hidden dark:border-slate-700">
        <!-- Users Card -->
        <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:before:bg-neutral-800" href="#">
            <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
                <svg class="flex-shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>

                <div class="grow">
                    <p class="text-xs uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">
                        Registered Users
                    </p>
                    <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-500">
                        {{ number_format($users->count(), 0) }}
                    </h3>

                    <div class="mt-1 flex justify-between items-center">
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                            customers <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $customers = $orders->unique('user')->count() }}</span>
                        </p>

                        <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lime-300 text-gray-800 dark:bg-lime-600 dark:text-neutral-200">
                            <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                            </svg>
                            <span>
                            {{ number_format($customers/$users->count() * 100, 1) }}%</span>
                        </span>
                    </div>
                </div>
            </div>
        </a>
        <!-- End Card -->

        <!-- Orders Card -->
        <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:before:bg-neutral-800" href="#">
            <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
                <svg class="flex-shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 22h14"/><path d="M5 2h14"/><path d="M17 22v-4.172a2 2 0 0 0-.586-1.414L12 12l-4.414 4.414A2 2 0 0 0 7 17.828V22"/><path d="M7 2v4.172a2 2 0 0 0 .586 1.414L12 12l4.414-4.414A2 2 0 0 0 17 6.172V2"/></svg>

                <div class="grow">
                    <p class="text-xs uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">
                        Orders
                    </p>
                    <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-500">
                        {{ $orTtl = $orders->count() }}
                    </h3>
                    <div class="mt-1 flex justify-between items-center">
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                            pending <span class="font-semibold text-gray-800 dark:text-neutral-200">{{ $pdOr = $orders->where('status', 'pending')->count() }}</span>
                        </p>
                        <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lime-300 text-gray-800 dark:bg-lime-600 dark:text-neutral-200">
                            <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                            </svg>
                            <span class="inline-block">
                                {{ number_format($pdOr/$orTtl * 100, 2) }}%
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </a>
        <!-- End Card -->

        <!-- Products Card -->
        <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:before:bg-neutral-800" href="#">
            <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
                <svg class="flex-shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h6"/><path d="m12 12 4 10 1.7-4.3L22 16Z"/></svg>

                <div class="grow">
                    <p class="text-xs uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">
                        Products
                    </p>
                    <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-500">
                        {{ $totalProducts = $products->count() }}
                    </h3>
                    <div class="mt-1 flex justify-between items-center">
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                            stocked <span class="font-semibold text-gray-800 dark:text-neutral-200">
                                {{ $stocked = $products->where('stock_quantity', '>', 0)->count() }}
                            </span>
                        </p>
                        <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lime-300 text-gray-800 dark:bg-lime-600 dark:text-neutral-200">
                            <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                            </svg>
                            <span class="inline-block">{{ number_format($stocked/$totalProducts * 100, 2) }}%</span>
                        </span>
                    </div>
                </div>
            </div>
        </a>
        <!-- End Card -->

        <!-- Posts Card -->
        <a class="block p-4 md:p-5 relative bg-white hover:bg-gray-50 before:absolute before:top-0 before:start-0 before:w-full before:h-px md:before:w-px md:before:h-full before:bg-gray-200 before:first:bg-transparent dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:before:bg-neutral-800" href="#">
            <div class="flex md:grid lg:flex gap-y-3 gap-x-5">
                <svg class="flex-shrink-0 size-5 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12s2.545-5 7-5c4.454 0 7 5 7 5s-2.546 5-7 5c-4.455 0-7-5-7-5z"/><path d="M12 13a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/><path d="M21 17v2a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-2"/><path d="M21 7V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2"/></svg>

                <div class="grow">
                    <p class="text-xs uppercase tracking-wide font-medium text-gray-800 dark:text-neutral-200">
                        Blog Posts
                    </p>
                    <h3 class="mt-1 text-xl sm:text-2xl font-semibold text-blue-600 dark:text-blue-500">
                        {{ $posts->count() }}
                    </h3>
                    <div class="mt-1 flex justify-between items-center">
                        <p class="text-xs text-gray-500 dark:text-neutral-500">
                            Total Views <span class="font-semibold text-gray-800 dark:text-neutral-200">
                                {{ number_format($posts->sum('views'), 0) }}
                            </span>
                        </p>
                        <span class="ms-1 inline-flex items-center gap-1.5 py-1 px-2 rounded-md text-xs font-medium bg-lime-300 text-gray-800 dark:bg-lime-600 dark:text-neutral-200">
                            <svg class="inline-block size-3 self-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="m7.247 4.86-4.796 5.481c-.566.647-.106 1.659.753 1.659h9.592a1 1 0 0 0 .753-1.659l-4.796-5.48a1 1 0 0 0-1.506 0z"/>
                            </svg>
                            <span class="inline-block">
                                {{ number_format($posts->where('views', '>', 0)->count()/$posts->count() * 100, 1) }}%
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </a>
        <!-- End Card -->
    </div>
    <!-- End Grid -->
</div>
<!-- End Card Section -->
