<div>
    <h4 class="py-3 my-4 font-semibold text-violet-600 dark:text-violet-500">Thank You! It's ready to ship.</h4>
    <h1 class="mt-3 py-2 font-extrabold text-slate-800 dark:text-slate-300">Order checkout Page</h1>

    <div class="mt-6 md:mt-10 py-8 lg:py-16 grid md:grid-cols-3 gap-6">
        <div class="col-span-2">
            @foreach($orderItems as $item)
                <x-cards.cart-item :product="$item" />
            @endforeach
        </div>

        <div class="md:col-span-2">
            <div class="mx-auto mt-6 max-w-4xl space-y-6 lg:mt-0 lg:w-full">
                <div class="space-y-4 md:sticky top-20 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <div class="space-y-4 mb-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <form class="space-y-4" wire:submit="applyDiscount">
                            <div>
                                <label for="voucher" class="mb-2 block text-xs font-medium text-gray-900 dark:text-white"> Do you have a Discount or Coupon Code? </label>
                                <input type="text"
                                       id="voucher"
                                       wire:model="discountCode"
                                       class="block w-full rounded-lg border border-orange-300 bg-gray-50 p-2.5 text-xs text-gray-900 focus:border-orange-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-orange-500"
                                       placeholder="Discount/Coupon code" />
                            </div>
                            <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-slate-700 px-5 py-2.5 text-xs font-medium text-white dark:text-slate-700 hover:bg-slate-500 dark:bg-slate-400 dark:hover:bg-slate-300">Apply Code</button>
                        </form>
                    </div>

                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">${{ $order->total }}</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                <dd class="text-base font-medium text-green-600">-$0.00</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">$0</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">$0</dd>
                            </dl>
                        </div>

                        <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                            <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                            <dd class="text-base font-bold text-gray-900 dark:text-white">$ {{ $order->subtotal }}</dd>
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
</div>
