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
                        @foreach($order->orderItems as $item)
                            <x-cards.order-item :item="$item" />
                        @endforeach
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

                    <div id="apply-discount">
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
                                    {{ config('app.currency_symbol'). ' '. number_format($order->subtotal, 2) }}
                                </dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Savings</dt>
                                <dd class="text-base font-medium text-green-500">
                                    {{ config('app.currency_symbol'). ' '. number_format($order->subtotal - $order->total,2) }}
                                </dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Store Pickup</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">
                                    {{ config('app.currency_symbol'). ' '. isset($order->shipping_fee) ? number_format($sh = $order->shipping_fee, 2) : '0.00' }}
                                </dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                <dd class="text-base font-medium text-gray-900 dark:text-white">{{ isset($order->total) ? number_format($tx = $order->tax, 2) : '0.00' }}</dd>
                            </dl>

                            <dl class="flex items-center justify-between gap-4 py-3">
                                <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                <dd class="text-base font-bold text-gray-900 dark:text-white">
                                    {{ config('app.currency_symbol'). ' '. number_format($payable = $order->total + $tx + $sh, 2) }}
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <button type="button"
                                @click="$dispatch('open-modal', 'lipa-na-mpesa')"
                                class="flex gap-x-6 items-center justify-center rounded-lg bg-green-600 px-5 py-2.5 text-sm font-medium text-white hover:bg-green-500 focus:outline-none dark:bg-green-500 dark:hover:bg-green-400">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 48 48">
                                <path fill="#aed580" d="M31.003,7.001l-0.001-5.5c0-0.828,0.672-1.5,1.5-1.5	c0.828,0,1.5,0.672,1.5,1.5v5.5H31.003z"></path><path fill="#aed580" d="M14.964,47.999h18.073c0.533,0,0.965-0.432,0.965-0.965V4.964c0-0.533-0.432-0.965-0.965-0.965	H14.964c-0.533,0-0.965,0.432-0.965,0.965v42.07C13.999,47.567,14.431,47.999,14.964,47.999z"></path><path fill="#fff" fill-rule="evenodd" d="M17.739,29.001h12.524c0.962,0,1.741-0.78,1.741-1.741V10.743	c0-0.962-0.78-1.741-1.741-1.741H17.739c-0.962,0-1.741,0.78-1.741,1.741V27.26C15.997,28.222,16.777,29.001,17.739,29.001z" clip-rule="evenodd"></path><path fill="#9b2310" fill-rule="evenodd" d="M12.001,22.001	c3.643-0.7,5.865-2.448,7-5c1.135,2.552,3.357,4.3,7,5H12.001z" clip-rule="evenodd"></path><path fill="#e60023" fill-rule="evenodd" d="M12.001,22.001	c4.273,0.867,6.476,1,11,1c5.076,0,11.712-1.939,14-6l-9-4C24.039,18.139,21.863,22.001,12.001,22.001z" clip-rule="evenodd"></path>
                            </svg>

                            Lipa na Mpesa
                        </button>

                        <livewire:payments.paypal-buttons :order="$order" :amount="$payable" />
                    </div>
                </div>
            </div>
        </form>
    </section>

    <x-modal name="lipa-na-mpesa">
        <div class="px-4 py-10 bg-slate-200 dark:bg-slate-700 text-slate-800 dark:text-slate-200">
            <h3 class="text-lg py-2 font-bold">Lipa Na Mpesa</h3>

            <p class="py-3 text-sm">We will send you STK push notification to your phone. Check, confirm, and Complete Payment by entering your MPESA PIN on your Phone.</p>

            <form class="max-w-sm" wire:submit="lipaNaMpesa">
                <div class="mb-5">
                    <label for="mpesa-number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Mpesa Number.</label>

                    <input type="text" id="mpesa-number"
                           name="mpesa-number"
                           wire:model="mpesaNumber"
                           placeholder="0720123456"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    @error('mpesaNumber')<p class="text-red-500 text-xs md:text-sm">{{ $message }}</p>@enderror
                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Pay Now!</button>
            </form>

            <div class="mt-3 py-4 flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-slate-700 dark:shadow-slate-700/70">
                <div class="border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:border-slate-700">
                    <p class="mt-1 text-sm text-slate-600 dark:text-slate-400">
                        Option 2: Pay with Paybill.
                    </p>
                </div>

                <div class="bg-slate-100 border-b border-slate-200 text-sm text-slate-800 p-4 dark:bg-slate-800 dark:border-slate-700 dark:text-white">
                    <p class="mt-1 py-2 text-sm text-slate-600 dark:text-slate-400">
                        Go to Mpesa. Select Lipa na Mpesa. <span class="font-semibold">Then Paybill</span>
                    </p>

                    Enter Paybill Number: <span class="font-bold">{{ config('mpesa.shortcode') }}</span><br>
                    Account Number: <span class="font-bold">{{ config('mpesa.paybill_account') }}</span><br>
                </div>
            </div>
        </div>
    </x-modal>
</div>
