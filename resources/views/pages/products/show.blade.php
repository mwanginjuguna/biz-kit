<x-guest-layout>
    <x-slot:title>
        {{ $product->name }}
    </x-slot:title>

    <div class="max-w-6xl mx-auto px-4 py-10 md:py-16 lg:py-24">

        <div class="py-3">
            <h1 class="py-2 text-slate-800 dark:text-slate-200 text-2xl md:text-3xl font-bold">
                Product Details: {{ $product->name }}
            </h1>
        </div>

        <div class="">
            <livewire:products.product-show :product="$product" />

            <x-parts.similar-products :products="$similarProducts" />
        </div>
    </div>
</x-guest-layout>
