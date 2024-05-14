<x-guest-layout>
    <x-slot:title>
        {{ $product->name }}
    </x-slot:title>

    <div class="max-w-6xl mx-auto px-4 py-10 md:py-16 lg:py-24">
        <div class="max-w-6xl px-4 py-10 mx-auto">
            <livewire:products.product-show :product="$product" />

            <x-parts.similar-products :products="$similarProducts" />
        </div>
    </div>
</x-guest-layout>
