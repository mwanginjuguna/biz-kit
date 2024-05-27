<div class="hidden md:mt-8 md:block px-4">
    <h3 class="text-2xl font-semibold text-gray-900 dark:text-white">People also bought</h3>
    <div class="mt-6 grid md:grid-cols-3 lg:grid-cols-5 gap-4 sm:mt-8 text-xs">
        @foreach($products as $tp)
            <div class="space-y-6 overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <a href="{{ route('products.show', $tp->slug) }}" class="overflow-hidden rounded">
                    <img class="mx-auto h-[185px] w-[185px]" src="/storage/{{ $tp->image }}" alt="imac image" />
                </a>
                <div class="px-2">
                    <a href="{{ route('products.show', $tp->slug) }}" class="md:text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white hover:text-orange-500 dark:hover:text-orange-500">
                        {{ \Illuminate\Support\Str::words($tp->name, 5) }}
                    </a>
                    <p class="mt-2 font-normal text-gray-500 dark:text-gray-400">{{ \Illuminate\Support\Str::words($tp->description, 10) }}</p>
                </div>
                <div class="px-2">
                    <p class="font-bold text-gray-900 dark:text-white">
                        <span class="line-through"> {{ config('app.currency_symbol') }} {{ number_format(($tp->price * 1.35), 2) }} </span>
                    </p>
                    <p class="text-sm font-bold leading-tight text-red-600 dark:text-red-500">{{ config('app.currency_symbol') .' '. $tp->price }}</p>
                </div>
            </div>
        @endforeach

    </div>
</div>
