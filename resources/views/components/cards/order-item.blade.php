@props([
'item',
'isOrder' => false,
])

<div class="max-w-2xl px-4 py-1.5 rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-slate-800">
    <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
        <img class="shrink-0 md:order-1 h-20 w-20" src="/storage/{{ $item->product->image ?? '' }}" alt="{{ $item->product->name }} image" />

        <div class="flex items-center justify-between md:order-3 md:justify-end">
            @if($isOrder)
                <p class="text-sm font-medium">Quantity: {{ $item->quantity }}</p>
            @else
                <label for="counter-input" class="sr-only">Quantity:</label>
                <div class="flex items-center">
                    <button type="button"
                            id="decrement-button"
                            data-input-counter-decrement="counter-input"
                            wire:click="removeItem({{ $item->id }})"
                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600"
                            wire:refresh
                    >
                        <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                        </svg>
                    </button>
                    <input type="text" id="counter-input" data-input-counter class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" placeholder="" value="{{ $item->quantity }}" required />
                    <button type="button" id="increment-button"
                            data-input-counter-increment="counter-input"
                            wire:click="addItem({{$item->id}})"
                            class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600"
                            wire:refresh
                    >
                        <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </button>
                </div>
            @endif
            <div class="text-end md:order-4 md:w-32">
                <p class="text-base font-bold text-gray-900 dark:text-white">{{ config('app.currency_symbol'). ' ' .number_format($item->subtotal, 2) }}</p>
            </div>
        </div>

        <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
            <a href="{{ route('products.show', $item->product->slug) }}" class="text-sm xl:text-base font-medium text-gray-900 hover:underline dark:text-white">{{ $item->product->name }}</a>
        </div>
    </div>
</div>
