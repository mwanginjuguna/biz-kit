<x-app-layout>
    <x-slot:title>All Orders Page.</x-slot:title>

    <div class="max-w-6xl mx-auto px-4 py-10 md:py-16">
        <livewire:orders.index :orders="$orders" />
    </div>
</x-app-layout>
