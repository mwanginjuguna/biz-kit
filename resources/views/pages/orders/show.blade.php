<x-app-layout>
    <x-slot:title>Order Page.</x-slot:title>

    <div class="max-w-6xl mx-auto px-4 py-10 md:py-16">
        <livewire:orders.show :order="$order" />
    </div>
</x-app-layout>
