<div class="flex items-center gap-3 p-3 {{ $product->stock_quantity == 0 ? 'bg-red-100 dark:bg-red-800' : 'bg-slate-100 dark:bg-slate-800' }} border border-slate-300 dark:border-slate-700 rounded-lg">
    <div class="flex-shrink-0">
        <img class="w-12 h-12 rounded-xl" src="/storage/{{ $product->image }}" alt="{{ $product->name }} image">
    </div>
    <div class="w-full text-slate-700 dark:text-slate-300">
        <p class="text-sm font-medium text-gray-900 dark:text-white">
            {{ $product->name }}
        </p>
        <p class="text-sm text-gray-500 dark:text-gray-400">
            {{ \Illuminate\Support\Str::words($product->description, 10) }}
        </p>
        <div class="text-sm grid md:grid-cols-2">
            <p class="font-medium py-1">Price: <span class="text-orange-700 dark:text-orange-300">{{ config('app.currency_symbol') .' '. $product->price }}</span></p>

            <p class="py-1">Brand: <span class="text-orange-700 dark:text-orange-300">{{ $product->brand }}</span> </p>
            <p class="py-1">Category: <span class="text-orange-700 dark:text-orange-300">{{ $product->category }}</span> </p>
            <p class="py-1">Viewed: <span class="text-orange-700 dark:text-orange-300">{{ $product->views }} times</span> </p>
            <p class="py-1">Remaining items: <span class="text-orange-700 dark:text-orange-300">{{ $product->stock_quantity }}</span> </p>
        </div>

        <div class="py-2 flex flex-row gap-4 text-xs lg:text-sm">
            @if($product->stock_quantity == 0)
                <x-primary-link href="{{ route('admin.products.edit', $product->slug) }}">Restock</x-primary-link>
            @endif

            <x-secondary-link href="{{ route('admin.products.edit', $product->slug) }}">View</x-secondary-link>
        </div>
    </div>

</div>
