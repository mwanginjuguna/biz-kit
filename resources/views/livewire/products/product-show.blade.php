<div class="relative p-6 md:p-16">
    <!-- Grid -->
    <div class="relative mt-6 z-10 lg:grid lg:grid-cols-12 lg:gap-16 lg:items-center">
        <div class="mb-10 lg:mb-0 lg:col-span-6 lg:col-start-8 lg:order-2">
            <h2 class="py-2 text-2xl text-gray-800 font-bold sm:text-3xl dark:text-neutral-200">
                {{ $product->name }}
            </h2>

            <div class="mt-4 py-3 sm:items-center sm:gap-4 sm:flex">
                <p
                    class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
                >
                    {{ config('app.currency_symbol') }} {{ $product->price }}
                </p>

                <div class="flex items-center gap-2 mt-2 sm:mt-0">
                    <div class="flex items-center gap-1">
                        <svg
                            class="w-4 h-4 text-yellow-300"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                            />
                        </svg>
                        <svg
                            class="w-4 h-4 text-yellow-300"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                            />
                        </svg>
                        <svg
                            class="w-4 h-4 text-yellow-300"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                            />
                        </svg>
                        <svg
                            class="w-4 h-4 text-yellow-300"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                            />
                        </svg>
                        <svg
                            class="w-4 h-4 text-yellow-300"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                            />
                        </svg>
                    </div>
                    <p
                        class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400"
                    >
                        (5.0)
                    </p>
                    <a
                        href="#"
                        class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white"
                    >
                        345 Reviews
                    </a>
                </div>
            </div>

            <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                <button
                    class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-slate-900 focus:outline-none bg-white rounded-lg border border-slate-200 hover:bg-slate-200 hover:text-slate-700 focus:z-10 dark:bg-slate-800 dark:text-slate-400 dark:border-slate-600 dark:hover:text-white dark:hover:bg-slate-700"
                    role="button"
                >
                    <svg
                        class="w-5 h-5 -ms-2 me-2"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"
                        />
                    </svg>
                    Add to favorites
                </button>

                <button
                    class="text-white mt-4 sm:mt-0 bg-orange-500 hover:bg-orange-600 font-medium rounded-lg text-sm px-5 py-2.5 flex items-center justify-center"
                    role="button"
                    wire:click="addToCart"
                >
                    <svg
                        class="w-5 h-5 -ms-2 me-2"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke="currentColor"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
                        />
                    </svg>

                    Add to cart
                </button>
            </div>

            <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

            <p class="mb-6 text-gray-500 dark:text-gray-400">
                {{ $product->description }}
            </p>
        </div>
        <!-- End Col -->

        <div class="lg:col-span-6">
            <div class="relative">
                <!-- Tab Content -->
                <div>
                    <div id="tabs-with-card-1" role="tabpanel" aria-labelledby="tabs-with-card-item-1">
                        <img class="shadow-xl shadow-gray-200 rounded-xl dark:shadow-gray-900/20 w-full" src="/{{ 'storage/'.$product->image }}" alt="Image Description">
                    </div>
                </div>
                <!-- End Tab Content -->

                <!-- SVG Element -->
                <div class="hidden absolute top-0 end-0 translate-x-20 md:block lg:translate-x-20">
                    <svg class="w-16 h-auto text-orange-500" width="121" height="135" viewBox="0 0 121 135" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M5 16.4754C11.7688 27.4499 21.2452 57.3224 5 89.0164" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                        <path d="M33.6761 112.104C44.6984 98.1239 74.2618 57.6776 83.4821 5" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                        <path d="M50.5525 130C68.2064 127.495 110.731 117.541 116 78.0874" stroke="currentColor" stroke-width="10" stroke-linecap="round"/>
                    </svg>
                </div>
                <!-- End SVG Element -->
            </div>
        </div>
        <!-- End Col -->
    </div>
    <!-- End Grid -->

    <!-- Background Color -->
    <div class="absolute inset-0 grid grid-cols-12 size-full">
        <div class="col-span-full lg:col-span-7 lg:col-start-6 bg-slate-100 w-full h-5/6 rounded-xl sm:h-3/4 lg:h-full dark:bg-slate-800"></div>
    </div>
    <!-- End Background Color -->
</div>
