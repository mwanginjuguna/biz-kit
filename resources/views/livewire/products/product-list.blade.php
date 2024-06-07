<div>
    <div class="py-6 text-slate-800 dark:text-slate-200">
        <h5 class="py-1 font-bold text-sm md:text-lg">Filters</h5>

        <div
            x-data="{showBrands: false, showCategories: false}"
            class="py-1 grid md:grid-cols-2 gap-4">
            <div class="flex items-center px-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="brandFilter"
                       type="radio"
                       wire:model="productFilter"
                       value="brand"
                       name="brandFilter"
                       @click="showBrands=true"
                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="brandFilter" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Filter by Brand</label>

                <div class="py-1">
                    <select id="productFilter"
                            wire:model="brandFilter"
                            x-show="showBrands"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            wire:change="applyFilter"
                    >
                        <option selected>Select brand</option>
                        @foreach($products->unique('brand') as $pr)
                            <option value="{{ $pr->brand }}">{{ $pr->brand }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex items-center px-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="categoryFilter"
                       type="radio"
                       wire:model="productFilter"
                       value="category"
                       name="categoryFilter"
                       @click="showCategories=true"
                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="categoryFilter" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Filter by Category</label>

                <div class="py-1">
                    <select id="productFilter"
                            wire:model="categoryFilter"
                            x-show="showCategories"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            wire:change="applyFilter"
                    >
                        <option selected>Select Category</option>
                        @foreach($products->unique('category') as $pr)
                            <option value="{{ $pr->category }}">{{ $pr->category }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex items-center px-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="purchasedFilter"
                       type="radio"
                       wire:model="productFilter"
                       value="purchased"
                       name="purchasedFilter"
                       wire:input="applyFilter"
                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="purchasedFilter" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Filter by Purchased</label>
            </div>

            <div class="flex items-center px-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="outOfStockFilter"
                       type="radio"
                       wire:model="productFilter"
                       value="outOfStock"
                       name="outOfStockFilter"
                       wire:input="applyFilter"
                       class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="outOfStockFilter" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Filter Out-Of Stock</label>
            </div>

        </div>

    </div>

    <div class="mx-auto mt-10 py-10 grid grid-cols-1 lg:grid-cols-2 gap-x-5 gap-y-10 border-t border-slate-200">
        @foreach($products as $product)
            <x-cards.product-horizontal-card :product="$product" />
        @endforeach
    </div>

    @script
    <script>
        Livewire.on('product-deleted', () => {
            Swal.fire({icon: 'warning', title: 'Deleted!', text:'Product Deleted Permanently!'});
        });
    </script>
    @endscript
</div>
