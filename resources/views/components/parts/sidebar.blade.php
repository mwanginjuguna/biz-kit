<div id="cta-button-sidebar"
     {{ $attributes }}
     aria-label="Sidebar">
    <div class="min-h-screen px-3 py-10 overflow-y-auto bg-slate-50 dark:bg-slate-800">
        <a href="/" class="flex items-center ps-2.5 mb-5" wire:navigate>
            <img src="{{ asset('assets/logo.png') }}" class="h-6 me-3 sm:h-7" alt="{{ config('app.name') }} Logo" />
            <span class="self-center font-semibold text-violet-600 dark:text-violet-500">{{ config('app.name') }}</span>
        </a>

        <ul class="mt-6 space-y-2 font-medium text-sm xL:text-base">
            <li>
                <a href="{{ auth()->user()->role === 'A' ? route('admin-dashboard') : route('dashboard') }}" class="flex items-center p-2 text-slate-900 dark:text-slate-100 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 group" wire:navigate>
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 dark:text-gray-400 transition duration-75 group-hover:text-gray-900 dark:group-hover:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>
                    <span class="ms-3">{{ __('Dashboard') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
