<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-serif antialiased"
          x-data="{ darkMode: false }"
          x-init="

            if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
              localStorage.setItem('darkMode', JSON.stringify(true));
            }
            darkMode = JSON.parse(localStorage.getItem('darkMode'));
            $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))"
          x-cloak
    >
    <div x-bind:class="{'dark' : darkMode === true}" class="relative min-h-screen sm:flex sm:flex-row bg-slate-100 dark:bg-slate-900 w-full" x-data="{showSidebar: false}">
        <button x-on:click="showSidebar = ! showSidebar"
                class="inline-flex absolute top-3 left-0 z-50 items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
        </button>

        <aside :class="{'hidden': !showSidebar, 'block': showSidebar}"
               class="sticky top-0 left-0 z-40 h-screen w-64 hidden md:block"
        >
            <x-parts.sidebar class="pt-6 sm:pt-0" ></x-parts.sidebar>
        </aside>

        <div class="min-h-screen w-full bg-slate-100 dark:bg-slate-900">
            <livewire:layout.navigation />

            <div class="min-h-screen w-full">
                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-slate-100 dark:bg-slate-900 shadow-sm">
                        <div class="container mx-auto py-3 px-4">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main>
                    <x-parts.flash-message />

                    {{ $slot }}
                </main>
            </div>

            <x-parts.footer />
        </div>
    </div>
    </body>
</html>
