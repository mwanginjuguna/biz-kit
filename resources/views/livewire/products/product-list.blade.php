<div>
    <div class="py-6">
        <h5 class="py-1 font-bold text-sm md:text-lg">Filters</h5>

        <div>
            <div class="w-full bg-white rounded-lg shadow-md dark:bg-neutral-800">
                <div class="border-b border-gray-200 px-4 dark:border-neutral-700">
                    <nav class="flex space-x-2" aria-label="Tabs" role="tablist">
                        <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active" id="basic-tabs-item-1">
                            Brands
                        </button>
                        <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500">
                            Category
                        </button>
                        <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500">
                            Out of Stock
                        </button>
                        <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500">
                            Purchased
                        </button>
                    </nav>
                </div>

                <div class="mt-3 p-4">
                    <div id="basic-tabs-1" role="tabpanel" aria-labelledby="basic-tabs-item-1">
                        <p class="text-gray-500 dark:text-neutral-400">
                            This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">first</em> item's tab body.
                        </p>
                    </div>
                    <div id="basic-tabs-2" class="hidden" role="tabpanel" aria-labelledby="basic-tabs-item-2">
                        <p class="text-gray-500 dark:text-neutral-400">
                            This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">second</em> item's tab body.
                        </p>
                    </div>
                    <div id="basic-tabs-3" class="hidden" role="tabpanel" aria-labelledby="basic-tabs-item-3">
                        <p class="text-gray-500 dark:text-neutral-400">
                            This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">third</em> item's tab body.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-1">
            <select id="productFilter"
                    wire:model="productFilter"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option selected>Filter Products</option>
                <option value="brand">Brand</option>
                <option value="category">Category</option>
                <option value="purchased">Purchased</option>
                <option value="outOfStock">Out of Stock</option>
            </select>
        </div>

        <div class="py-1">
            <select id="productFilter"
                    wire:model="filterValue"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >
                <option selected></option>
                <option value="brand">Brand</option>
                <option value="category">Category</option>
                <option value="purchased">Purchased</option>
                <option value="outOfStock">Out of Stock</option>
            </select>
        </div>
    </div>
    <x-cards.product-filters-card />

    <div class="mx-auto mt-10 py-10 grid grid-cols-1 lg:grid-cols-2 gap-x-5 gap-y-10 border-t border-slate-200">
        @foreach($products as $product)
            <x-cards.product-horizontal-card :product="$product" />
        @endforeach
    </div>
</div>
