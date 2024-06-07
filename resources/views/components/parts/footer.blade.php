<footer class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-6xl p-4 py-6 lg:py-8">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <a href="{{ config('app.url') }}" class="flex items-center">
                    <x-application-logo class="h-8" />
                    <span class="pl-1 self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ config('app.name') }}</span>
                </a>
            </div>
            <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Resources</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="{{ route('blog') }}" class="hover:underline">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('shop') }}" class="hover:underline">Shop</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Company</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="{{ route('about') }}" class="hover:underline ">About Us</a>
                        </li>
                        <li class="mb-4">
                            <a href="{{ route('services') }}" class="hover:underline ">Our Services</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">Legal</h2>
                    <ul class="text-gray-500 dark:text-gray-400 font-medium">
                        <li class="mb-4">
                            <a href="/privacy-policy" class="hover:underline">Privacy Policy</a>
                        </li>
                        <li>
                            <a href="/terms-and-conditions" class="hover:underline">Terms &amp; Conditions</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ now()->year }} <a href="{{ config('app.url') }}" class="hover:underline">{{ config('app.name') }}™</a>. All Rights Reserved.
          </span>

            <x-utils.social-icons />
        </div>
    </div>
</footer>
