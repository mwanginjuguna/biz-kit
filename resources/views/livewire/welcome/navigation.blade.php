
<nav x-data="{ open: false }" class="sticky top-0 z-50 bg-white dark:bg-slate-900">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto object-cover object-center text-slate-800 dark:text-slate-200" />
                    </a>
                    <span class="pl-1 font-bold text-red-600 dark:text-red-500 text-xs lg:text-sm">{{ config('app.name') }}</span>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                        {{ __('Home') }}
                    </x-nav-link>
                    <x-nav-link :href="route('services')" :active="request()->routeIs('services')" wire:navigate>
                        {{ __('Services') }}
                    </x-nav-link>
                    <x-nav-link :href="route('blog')" :active="request()->routeIs('blog')" wire:navigate>
                        {{ __('Blog') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="flex flex-row gap-x-4 items-center">
                <x-utils.dark-mode-toggle />
                <div class="hidden sm:block">
                    @auth()
                        <x-secondary-link href="{{ route('dashboard') }}" class="text-sm">Dashboard</x-secondary-link>
                    @endauth
                    @guest()
                        <x-secondary-link href="{{ route('login') }}" class="text-sm">Login</x-secondary-link>
                    @endguest
                </div>
                <x-primary-link href="{{ route('contact-me') }}" class="hidden md:block">Contact Me</x-primary-link>
            </div>


            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')" wire:navigate>
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('services')" :active="request()->routeIs('services')" wire:navigate>
                {{ __('Services') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('blog')" :active="request()->routeIs('blog')" wire:navigate>
                {{ __('Blog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact-me')" :active="request()->routeIs('contact-me')" wire:navigate>
                {{ __('Contact Me') }}
            </x-responsive-nav-link>
            <div class="pl-4">
                @auth()
                    <x-secondary-link href="{{ route('dashboard') }}" class="text-sm">Dashboard</x-secondary-link>
                @endauth
                @guest()
                    <x-secondary-link href="{{ route('login') }}" class="text-sm">Login</x-secondary-link>
                @endguest
            </div>
        </div>

        <!-- Responsive Settings Options -->
        @auth()
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                    <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile')" wire:navigate>
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <button wire:click="logout" class="w-full text-start">
                        <x-responsive-nav-link>
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </button>
                </div>
            </div>
        @endauth
    </div>
</nav>
