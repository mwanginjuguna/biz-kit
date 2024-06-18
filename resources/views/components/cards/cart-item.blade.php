@props(['product'])

<div class="rounded-lg border border-slate-200 bg-white p-4 shadow-sm dark:border-slate-600 dark:bg-slate-700 md:p-6">
    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
        <a href="#" class="shrink-0 md:order-1">
            <img class="h-20 w-20" src="/storage/{{ $product['image'] ?? '' }}" alt="{{ $product['product']['name'] }} image" />
        </a>

        <label for="counter-input" class="sr-only">Choose quantity:</label>
        <div class="flex items-center justify-between md:order-3 md:justify-end">
            <div class="flex items-center">
                <button type="button"
                        id="decrement-button"
                        data-input-counter-decrement="counter-input"
                        wire:click="removeFromCart({{ $product['product']['id'] }})"
                        class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none dark:border-gray-600 dark:bg-slate-800 dark:hover:bg-gray-900"
                        wire:refresh
                >
                    <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                    </svg>
                </button>
                <input type="text" id="counter-input" data-input-counter class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" placeholder="" value="{{ $product['quantity'] }}" required />
                <button type="button" id="increment-button"
                        data-input-counter-increment="counter-input"
                        wire:click="addToCart({{$product['product']['id']}})"
                        class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 dark:border-gray-600 dark:bg-slate-800 dark:hover:bg-gray-900"
                        wire:refresh
                >
                    <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </button>
            </div>
            <div class="text-end md:order-4 md:w-32">
                <p class="text-base font-bold text-gray-900 dark:text-white">{{ config('app.currency_symbol') }} {{ number_format($product['subtotal'], 2) }}</p>
            </div>
        </div>

        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
            <a href="#" class="text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $product['product']['name'] }}</a>

            <div class="flex items-center gap-4">
                <button type="button"
                        class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 hover:underline dark:text-gray-400 dark:hover:text-white"
                        wire:click="addToWishlist({{ $product['product']['id'] }})">
                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                    </svg>
                    Add to Favorites
                </button>
            </div>
        </div>
    </div>
</div>
