<div class="px-4">
    <h4 class="w-max px-2 py-1 bg-slate-200 dark:bg-slate-700 border dark:border-slate-600 rounded-lg text-sm lg:text-lg font-medium text-amber-600 dark:text-amber-400">Thank You! It's ready to ship.</h4>
    <h1 class="my-3 py-2 text-xl text-2xl font-extrabold text-slate-800 dark:text-slate-300">Checkout</h1>

    <section class="relative bg-white mt-6 py-8 antialiased dark:bg-gray-900 md:py-16">
        <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0">
            <ol class="items-center flex w-full max-w-2xl text-center text-sm font-medium text-gray-500 dark:text-gray-400 sm:text-base">
                <li class="after:border-1 flex items-center text-blue-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-blue-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                    <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                      <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      Cart
                    </span>
                </li>

                <li class="after:border-1 flex items-center text-blue-700 after:mx-6 after:hidden after:h-1 after:w-full after:border-b after:border-gray-200 dark:text-blue-500 dark:after:border-gray-700 sm:after:inline-block sm:after:content-[''] md:w-full xl:after:mx-10">
                    <span class="flex items-center after:mx-2 after:text-gray-200 after:content-['/'] dark:after:text-gray-500 sm:after:hidden">
                      <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                      </svg>
                      Checkout
                    </span>
                </li>

                <li class="flex shrink-0 items-center">
                    <svg class="me-2 h-4 w-4 sm:h-5 sm:w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    Order summary
                </li>
            </ol>

            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-12 xl:gap-16">
                <div class="min-w-0 flex-1 space-y-8">
                    <div class="space-y-4">
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>

                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                            <div>
                                <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your name </label>
                                <input type="text" id="name"
                                       wire:model="form.name"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                                       placeholder="Connie Jambo" required />
                            </div>

                            <div>
                                <label for="your_email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your email* </label>
                                <input type="email" id="your_email"
                                       wire:model="form.email"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                       placeholder="name@gmail.com" required />
                            </div>

                            <div>
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="select-country-input-3" class="block text-sm font-medium text-gray-900 dark:text-white"> Country* </label>
                                </div>
                                <select id="select-country-input-3"
                                        wire:model="form.country"
                                        class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500">
                                    <option value="KE" selected>Kenya</option>
                                    <option value="US">United States</option>
                                    <option value="AS">Australia</option>
                                    <option value="FR">France</option>
                                    <option value="ES">Spain</option>
                                    <option value="UK">United Kingdom</option>
                                </select>
                            </div>

                            <div>
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="city" class="block text-sm font-medium text-gray-900 dark:text-white"> City* </label>
                                </div>
                                <input type="text" id="city"
                                       wire:model="form.city"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                       placeholder="Nairobi" required />
                            </div>

                            <div>
                                <div class="mb-2 flex items-center gap-2">
                                    <label for="apartment-suite" class="block text-sm font-medium text-gray-900 dark:text-white"> Street / Apartment Suite </label>
                                </div>
                                <input type="text" id="apartment-suite"
                                       wire:model="form.apartmentSuite"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                       placeholder="Palace Apartments, Soweto, Kahawa West" />
                            </div>

                            <div>
                                <label for="phone-number" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Phone Number* </label>
                                <input type="text" id="phone-number"
                                       wire:model="form.phoneNumber"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500"
                                       placeholder="+254 712 000 000" required />
                            </div>

                            <div>
                                <label for="address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Address* </label>
                                <input type="text" id="address"
                                       wire:model="form.streetAddress"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="PO Box 2456 Kahawa West, Nairobi" required />
                            </div>

                            <div>
                                <label for="zip-code" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Zip Code* </label>
                                <input type="text" id="zip-code"
                                       wire:model="form.zipCode"
                                       class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="00100" required />
                            </div>

                            <div>
                                <label for="company_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Company name </label>
                                <input type="text" id="company_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Fitbit LTD" />
                            </div>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Methods</h3>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="dhl" aria-describedby="dhl-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" checked />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="dhl" class="font-medium leading-none text-gray-900 dark:text-white"> $15 - DHL Fast Delivery </label>
                                        <p id="dhl-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by Tommorow</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="fedex" aria-describedby="fedex-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="fedex" class="font-medium leading-none text-gray-900 dark:text-white"> Free Delivery - FedEx </label>
                                        <p id="fedex-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it by Friday, 13 Dec 2023</p>
                                    </div>
                                </div>
                            </div>

                            <div class="rounded-lg border border-gray-200 bg-gray-50 p-4 ps-4 dark:border-gray-700 dark:bg-gray-800">
                                <div class="flex items-start">
                                    <div class="flex h-5 items-center">
                                        <input id="express" aria-describedby="express-text" type="radio" name="delivery-method" value="" class="h-4 w-4 border-gray-300 bg-white text-primary-600 focus:ring-2 focus:ring-primary-600 dark:border-gray-600 dark:bg-gray-700 dark:ring-offset-gray-800 dark:focus:ring-primary-600" />
                                    </div>

                                    <div class="ms-4 text-sm">
                                        <label for="express" class="font-medium leading-none text-gray-900 dark:text-white"> $49 - Express Delivery </label>
                                        <p id="express-text" class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Get it today</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="voucher" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Enter a gift card, voucher or promotional code </label>
                        <div class="flex max-w-md items-center gap-4">
                            <input type="text" id="voucher"
                                   wire:model="discountCode"
                                   class="block w-full rounded-lg border border-orange-300 bg-gray-50 p-2.5 text-sm text-gray-900 dark:border-orange-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400" placeholder="" required />
                            <button type="button" class="flex items-center justify-center rounded-lg bg-amber-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-amber-500 focus:outline-none dark:bg-amber-600 dark:hover:bg-amber-500">Apply</button>
                        </div>
                    </div>
                </div>

                <div class="md:sticky md:top-10 mt-6 w-full space-y-6 sm:mt-8 lg:mt-0 lg:max-w-xs xl:max-w-md">
                    <div class="flow-root">
                        <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Subtotal</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    {{ config('app.currency_symbol'). ' '. $order->subtotal }}
                                </dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                <dd class="text-base font-medium text-green-500">
                                    {{ config('app.currency_symbol'). ' '. ($order->subtotal - $order->total) }}
                                </dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">0</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">{{ $order->tax ?? 0 }}</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">
                                    {{ config('app.currency_symbol'). ' '. $order->total }}
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <livewire:payments.paypal-buttons :order="$order" />
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
