<?php

namespace App\Livewire\Products;

use App\Actions\ProductFilters;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ProductList extends Component
{
    public Collection|Paginator $products;

    public string $productFilter;

    public string $brandFilter;
    public string $categoryFilter;


    public array $availableFilters = [
        'brand' => 'brand',
        'category' => 'category',
        'purchased' => 'purchased',
        'outOfStock' => 'stock_quantity',
    ];

    public function applyFilter()
    {
        $val = $this->availableFilters[$this->productFilter];

        switch ($val) {
            case 'brand':
                $this->products = (new ProductFilters)->productsByBrand($this->brandFilter)->get();
                break;
            case 'category':
                $this->products = (new ProductFilters)->productsByCategory($this->categoryFilter)->get();
                break;
            case 'purchased':
                $this->products = (new ProductFilters)->purchasedProducts()->get();
                break;
            case 'stock_quantity':
                $this->products = (new ProductFilters)->outOfStock()->get();
                break;
            default:
                $this->products = Product::query()->latest()->simplePaginate(48);
                break;
        }
    }

    public function render()
    {
        return view('livewire.products.product-list');
    }
}
