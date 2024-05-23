<!-- Card -->
<div class="group shadow-sm rounded-xl dark:shadow-slate-700 border border-slate-50 hover:border-orange-200 dark:border-slate-900 dark:hover:border-orange-800 transition-all ease-in-out duration-300">
    <div class="relative pt-[50%] sm:pt-[70%] rounded-xl overflow-hidden">
        <img
            class="size-full absolute top-0 start-0 object-cover group-hover:scale-105 transition-transform duration-500 ease-in-out rounded-xl"
            src="{{ $imgUrl ?? 'https://images.unsplash.com/photo-1586232702178-f044c5f4d4b7?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1035&q=80' }}"
            alt="{{ $title ?? 'Image Description' }}">
        <span class="absolute top-0 end-0 rounded-se-xl rounded-es-xl text-xs font-medium bg-gray-800 text-white py-1.5 px-3 dark:bg-neutral-900">
          Featured
        </span>
    </div>

    <div class="mt-7 p-2">
        <h3 class="text-xl font-semibold">
            {{ $title ?? 'How to Avoid Injuries in Strength Training.' }}
        </h3>
        <p class="mt-3">
            {{ $excerpt ?? 'N/A' }}
        </p>
        <x-parts.learn-more-link href="{{ $href ?? route('blog') }}" />
    </div>
</div>
<!-- End Card -->
