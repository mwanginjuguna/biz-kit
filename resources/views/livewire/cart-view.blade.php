<div>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="relative mx-auto max-w-screen-xl px-4 2xl:px-0">
            <div class="py-4 flex flex-col gap-8 md:flex-row md:justify-between">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>

                <button type="button"
                        wire:click="clearCart"
                        class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500">
                    <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>
                    Clear All
                </button>
            </div>


            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        @foreach($cart as $item)
                            <x-cards.cart-item :product="$item" />
                        @endforeach
                    </div>
                </div>

                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div class="space-y-4 md:sticky top-20 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

                        <div class="space-y-4">
                            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">
                                    {{ config('app.currency_symbol') }} {{ number_format($cartTotal, 2) }}
                                </dd>
                            </dl>
                        </div>

                        <button
                            wire:click="checkout"
                            class="flex w-full items-center justify-center rounded-lg bg-orange-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-orange-700">
                            Proceed to Checkout
                        </button>

                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                            <a href="{{ route('products') }}" title="" class="inline-flex items-center gap-2 text-sm font-medium text-blue-500 underline hover:no-underline dark:text-blue-600">
                                Continue Shopping
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <x-parts.similar-products :products="$topProducts" />
    </section>
</div>
