<div>
    <!-- Contact Us -->
    <div class="px-4 py-10 sm:px-6 lg:px-8 lg:py-14">
        <div class="">
            <div class="text-center">
                <h3 class="text-3xl font-bold text-gray-800 sm:text-4xl dark:text-white">
                    Leave A Message
                </h3>
                <p class="mt-1 text-gray-600 dark:text-neutral-400">
                    We'd love to hear from you and answer any questions.
                </p>
            </div>

            <div class="mt-12 grid items-center md:grid-cols-2 gap-6 lg:gap-16">
                <!-- Card -->
                <div class="flex flex-col border rounded-xl p-4 sm:p-6 lg:p-8 dark:border-slate-700">
                    <h2 class="mb-8 text-xl font-semibold text-gray-800 dark:text-neutral-200">
                        Fill in the form
                    </h2>

                    <form wire:submit="save">
                        <div class="grid gap-4">
                            <!-- Grid -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label for="first-name" class="sr-only">First Name</label>
                                    <input type="text" name="first-name" id="first-name"
                                           wire:model="form.firstName"
                                           class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-slate-300 dark:placeholder-slate-500" placeholder="First Name">
                                </div>

                                <div>
                                    <label for="last-name" class="sr-only">Last Name</label>
                                    <input type="text" name="last-name" id="last-name"
                                           wire:model="form.lastName"
                                           class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-slate-300 dark:placeholder-slate-500" placeholder="Last Name">
                                </div>
                            </div>
                            <!-- End Grid -->

                            <div>
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" autocomplete="email"
                                       wire:model="form.email"
                                       class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-slate-300 dark:placeholder-slate-500" placeholder="Email">
                            </div>

                            <div>
                                <label for="phone-number" class="sr-only">Phone Number</label>
                                <input type="text" name="phone-number" id="phone-number"
                                       wire:model="form.phoneNumber"
                                       class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm dark:bg-slate-700 dark:border-slate-600 dark:text-slate-300 dark:placeholder-slate-500" placeholder="Phone Number">
                            </div>

                            <div>
                                <label for="message" class="sr-only">Message</label>
                                <textarea id="message" name="message"
                                          wire:model="form.message"
                                          rows="4" class="py-3 px-4 block w-full border-slate-300 rounded-lg text-sm focus:border-slate-400 dark:bg-slate-700 dark:border-slate-600 dark:text-slate-300 dark:placeholder-slate-500" placeholder="Details"></textarea>
                            </div>
                        </div>
                        <!-- End Grid -->

                        <div class="mt-4 grid">
                            <button type="submit" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-orange-600 text-white hover:bg-orange-500 dark:bg-orange-500 dark:hover:bg-orange-400">
                                Send inquiry
                            </button>
                        </div>

                        @if($saved)
                            <div class="mt-3 text-center">
                                <p class="text-sm text-slate-600 dark:text-slate-400">
                                    We'll get back to you in 1-2 business days.
                                </p>
                            </div>
                        @endif
                    </form>
                </div>
                <!-- End Card -->

                <div class="divide-y divide-gray-200 dark:divide-slate-800">
                    <!-- Icon Block -->
                    <div class="flex gap-x-7 py-6">
                        <svg class="flex-shrink-0 size-6 mt-1.5 text-gray-800 dark:text-slate-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                        <div class="grow">
                            <h3 class="font-semibold text-gray-800 dark:text-slate-200">Knowledgebase</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-slate-500">We're here to help with any questions or code.</p>
                            <x-parts.learn-more-link href="#">Browse Materials</x-parts.learn-more-link>
                        </div>
                    </div>
                    <!-- End Icon Block -->

                    <!-- Icon Block -->
                    <div class="flex gap-x-7 py-6">
                        <svg class="flex-shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/><path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/></svg>
                        <div class="grow">
                            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">FAQ</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Search our FAQ for answers to anything you might ask.</p>
                            <x-parts.learn-more-link href="#">Visit FAQs</x-parts.learn-more-link>
                        </div>
                    </div>
                    <!-- End Icon Block -->

                    <!-- Icon Block -->
                    <div class=" flex gap-x-7 py-6">
                        <svg class="flex-shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 11 2-2-2-2"/><path d="M11 13h4"/><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/></svg>
                        <div class="grow">
                            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Developer APIs</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">Check out our development quickstart guide.</p>
                            <x-parts.learn-more-link href="#">Contact Sales</x-parts.learn-more-link>
                        </div>
                    </div>
                    <!-- End Icon Block -->

                    <!-- Icon Block -->
                    <div class=" flex gap-x-7 py-6">
                        <svg class="flex-shrink-0 size-6 mt-1.5 text-gray-800 dark:text-neutral-200" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.2 8.4c.5.38.8.97.8 1.6v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V10a2 2 0 0 1 .8-1.6l8-6a2 2 0 0 1 2.4 0l8 6Z"/><path d="m22 10-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 10"/></svg>
                        <div class="grow">
                            <h3 class="font-semibold text-gray-800 dark:text-neutral-200">Contact us by email</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-neutral-500">If you wish to write us an email instead please use</p>
                            <a class="mt-2 inline-flex items-center gap-x-2 text-sm font-medium text-blue-600 hover:text-blue-500 dark:text-blue-500 dark:hover:text-blue-400" href="mailto:#">
                                example@site.com
                            </a>
                        </div>
                    </div>
                    <!-- End Icon Block -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Contact Us -->
</div>
