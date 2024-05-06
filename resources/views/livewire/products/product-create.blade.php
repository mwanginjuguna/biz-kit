<section class="bg-slate-100 dark:bg-slate-800 rounded-xl">
    <div class="py-8 px-4 mx-auto max-w-2xl lg:py-16">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
        <form wire:submit="productSave" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Name <span class="text-xs text-red-600">*</label>
                    <input type="text"
                           name="name"
                           id="name"
                           wire:model="form.name"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Type product name"
                           required>
                    @error('form.name')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <div class="w-full">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Brand</label>
                    <input type="text"
                           name="brand"
                           wire:model="form.brand"
                           id="brand"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Product brand">
                    @error('form.brand')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <div class="w-full">
                    <label for="return-policy" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Return Policy <span class="text-xs text-gray-600">Optional</span></label>
                    <input type="text"
                           name="return-policy"
                           id="return-policy"
                           wire:model="form.returnPolicy"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="E.g. 30 Days, 14 Days">
                    @error('form.returnPolicy')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <div class="w-full">
                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price <span class="text-xs text-red-500">*</label>
                    <input type="text"
                           name="price"
                           id="price"
                           wire:model="form.price"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="E.g. 10, 200, 122.50"
                           required>
                    @error('form.price')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Product Category</label>
                    <input type="text"
                           name="category"
                           wire:model="form.category"
                           id="category"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                           placeholder="Ex. Fashion, Fitness, Electronics, Phones...">
                    @error('form.category')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="stock-quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Stock Quantity - <span class="text-xs text-gray-600">Optional</span>
                    </label>
                    <input type="number"
                           name="stock-quantity"
                           id="stock-quantity"
                           wire:model="form.stockQuantity"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Products in stock e.g. 12, 10">
                    @error('form.stockQuantity')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label for="shipped-from" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Shipped From - <span class="text-xs text-gray-600">Optional</span>
                    </label>
                    <input type="text"
                           name="shipped-from"
                           id="shipped-from"
                           wire:model="form.shippedFrom"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Shipping location e.g. Nairobi, Abroad, China">
                    @error('form.shippedFrom')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload 1 main product Image <span class="text-xs text-gray-600">Optional</span></label>
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           wire:model="productImage"
                           id="file_input" type="file">
                    <p class="text-xs text-slate-500">(You will upload more after the product is added.)</p>
                    @error('productImage')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>

                <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description <span class="text-xs text-red-500">*</span> </label>
                    <textarea id="description"
                              rows="8"
                              wire:model="form.description"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                              placeholder="Your description here"></textarea>
                    @error('form.description')<p class="text-red-600 text-sm font-medium">{{ $message }}</p>@enderror
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-orange-700 rounded-lg hover:bg-orange-800">
                Add product
            </button>
        </form>
    </div>
</section>
