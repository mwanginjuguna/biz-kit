<!-- Card -->
<div class="mt-3 group rounded-xl overflow-hidden shadow-sm dark:shadow-slate-800 border border-slate-50 dark:border-slate-900 hover:border-orange-200 dark:hover:border-orange-800">
    <div class="sm:flex items-center">
        <div class="flex-shrink-0 relative rounded-xl overflow-hidden w-full sm:w-56 h-44">
            <img
                class="group-hover:scale-105 transition-transform duration-500 ease-in-out size-full absolute top-0 start-0 object-cover rounded-xl"
                 src="{{ $imgUrl ?? 'https://images.unsplash.com/photo-1540575861501-7cf05a4b125a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80' }}"
                alt="{{ $title ?? 'Image Description'}}">
        </div>

        <div class="grow mt-4 sm:mt-0 sm:ms-6 px-4 sm:px-0">
            <h3 class="font-semibold text-gray-800 group-hover:text-gray-600 dark:text-neutral-300 dark:group-hover:text-white">
                {{ $title ?? 'Personal Training Debunked' }}
            </h3>
            <p class="mt-3 text-gray-600 dark:text-neutral-400 text-sm">
                {{ $excerpt ?? 'N/A' }}
            </p>
            <x-parts.learn-more-link href="{{ $href ?? route('blog') }}" />
        </div>
    </div>
</div>
<!-- End Card -->
