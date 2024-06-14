<x-guest-layout>
    <x-slot:title>
        Product List
    </x-slot:title>

    <section class="max-w-7xl mx-auto px-4 py-8 md:py-12 lg:py-20">
        <div class="mx-auto max-w-2xl lg:mx-0">
            <h2 class="text-3xl font-bold tracking-tight text-slate-900 dark:text-slate-100 sm:text-4xl">Shop Now: Browse Products</h2>
            <p class="mt-2 text-lg leading-8 text-slate-600 dark:text-slate-300">A Seamless Shopping Experience with Top Rated Products by Our Customers.</p>
        </div>

        <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-slate-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none md:grid-cols-3 lg:grid-cols-6">
            @foreach($products as $product)
                <x-cards.product-card :product="$product" />
            @endforeach
        </div>

        <div class="max-w-sm mt-6 py-2">
            {{ $products->links() }}
        </div>
    </section>
</x-guest-layout>
