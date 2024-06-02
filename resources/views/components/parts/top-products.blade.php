@props(['topProducts'])

<!-- List Group -->
<ul class="mt-3 flex flex-col">
    @forelse($topProducts as $product)
        <li class="-mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg ">
            <a href="{{ route('products.show', $product->slug) }}" class="inline-flex w-full items-center gap-x-2 py-3 px-4 text-xs border text-gray-800 dark:border-slate-600 dark:text-neutral-200">
                <img class="inline-block flex-shrink-0 size-11 rounded-lg" src="/storage/{{ $product->image }}" alt="Image Description">
                <div class="flex items-center justify-between w-full">
                    <span>{{ $product->name }}</span>
                    <span>{{ $product->count }}</span>
                </div>
            </a>
        </li>

    @empty
        <p class="py-1">No Purchased Products, Yet.</p>
    @endforelse
</ul>
<!-- End List Group -->
