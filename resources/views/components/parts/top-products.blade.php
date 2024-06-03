@props(['topProducts'])

<!-- List Group -->
<ul class="mt-3 flex flex-col">
    <li class="px-4">
        <div class="flex items-center justify-between w-full text-sm">
            <p>Product</p>
            <p class="flex flex-row items-center gap-x-1 text-lime-600 dark:text-lime-500">Sales</p>
        </div>
    </li>
    @forelse($topProducts as $product)
        <li class="-mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg ">
            <a href="{{ route('products.show', $product->slug) }}" class="inline-flex w-full items-center gap-x-2 py-3 px-4 text-xs border text-gray-800 dark:border-slate-600 dark:text-neutral-200">
                <img class="inline-block flex-shrink-0 size-11 rounded-lg" src="/storage/{{ $product->image }}" alt="Image Description">
                <div class="flex items-center justify-between w-full">
                    <p>{{ $product->name }}</p>
                    <p class="pl-2 font-semibold text-sm text-lime-600 dark:text-lime-500">{{ $product->count }}</p>
                </div>
            </a>
        </li>
    @empty
        <p class="py-1">No Purchased Products, Yet.</p>
    @endforelse
</ul>
<!-- End List Group -->
