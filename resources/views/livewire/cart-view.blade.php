<div>
    <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
        <div class="relative mx-auto max-w-screen-xl px-4 2xl:px-0">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>

            <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                <div class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">
                    <div class="space-y-6">
                        <x-cards.cart-item />
                    </div>
                </div>

                <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full">
                    <div class="space-y-4 sticky top-20 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

                        <div class="space-y-4">
                            <div class="space-y-2">
                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">$7,592.00</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                    <dd class="text-base font-medium text-green-600">-$299.00</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">$99</dd>
                                </dl>

                                <dl class="flex items-center justify-between gap-4">
                                    <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">$799</dd>
                                </dl>
                            </div>

                            <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">$8,191.00</dd>
                            </dl>
                        </div>

                        <a href="#" class="flex w-full items-center justify-center rounded-lg bg-orange-500 px-5 py-2.5 text-sm font-medium text-white hover:bg-orange-700">Proceed to Checkout</a>

                        <div class="flex items-center justify-center gap-2">
                            <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                            <a href="#" title="" class="inline-flex items-center gap-2 text-sm font-medium text-blue-500 underline hover:no-underline dark:text-blue-600">
                                Continue Shopping
                                <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <form class="space-y-4">
                            <div>
                                <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Do you have a Discount or Coupon Code? </label>
                                <input type="text"
                                       id="voucher"
                                       class="block w-full rounded-lg border border-orange-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-orange-500"
                                       placeholder="Discount/Coupon code" />
                            </div>
                            <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-slate-700 px-5 py-2.5 text-sm font-medium text-white dark:text-slate-700 hover:bg-slate-500 dark:bg-slate-400 dark:hover:bg-slate-300">Apply Code</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden md:mt-8 md:block px-4">
            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
            <div class="mt-6 grid md:grid-cols-3 lg:grid-cols-5 gap-4 sm:mt-8 text-xs">
                @foreach($topProducts as $tp)
                    <div class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <a href="{{ route('products.show', $tp->slug) }}" class="overflow-hidden rounded">
                            <img class="mx-auto h-[185px] w-[185px]" src="/storage/{{ $tp->image }}" alt="imac image" />
                        </a>
                        <div class="px-2">
                            <a href="{{ route('products.show', $tp->slug) }}" class="md:text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white hover:text-orange-500 dark:hover:text-orange-500">{{ $tp->name }}</a>
                            <p class="mt-2 font-normal text-gray-500 dark:text-gray-400">{{ \Illuminate\Support\Str::words($tp->description, 15) }}</p>
                        </div>
                        <div class="px-2">
                            <p class="font-bold text-gray-900 dark:text-white">
                                <span class="line-through"> &dollar; {{ number_format(($tp->price * 0.75), 2) }} </span>
                            </p>
                            <p class="text-sm font-bold leading-tight text-red-600 dark:text-red-500">&dollar; {{ $tp->price }}</p>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
</div>
