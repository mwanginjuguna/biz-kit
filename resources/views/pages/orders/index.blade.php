<x-app-layout>
    <x-slot:title>All Orders Page.</x-slot:title>

    <div class="max-w-6xl mx-auto px-4 py-10 md:py-16">
        <h1 class="py-2 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            <span class="text-blue-600 dark:text-blue-500">All Orders</span>.
        </h1>

        <livewire:orders.index :orders="$orders" />
    </div>
</x-app-layout>
