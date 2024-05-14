<x-guest-layout>
    <x-slot:title>
        Cart - Shopping List
    </x-slot:title>

    <div class="container mx-auto px-4 py-10 md:py-20">
        <livewire:cart-view @add-to-cart="$refresh" @remove-from-cart="$refresh" />
    </div>
</x-guest-layout>
