<?php

namespace App\Livewire\Products;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ProductList extends Component
{
    public Collection $products;

    public string $productFilter;

    public array $availableFilters = [
        'brand' => 'brand',
        'category' => 'category',
        'purchased' => 'purchased',
        'outOfStock' => 'stock_quantity',
    ];

    public function applyFilter()
    {
        $val = $this->availableFilters[$this->productFilter];

        $result = $this->products->where($val);

        dd($result);
    }

    public function render()
    {
        return view('livewire.products.product-list');
    }
}
