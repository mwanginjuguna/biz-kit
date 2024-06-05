<?php

namespace App\Actions;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class ProductFilters
{
    public Builder $query;
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        $this->query = \App\Models\Product::query();
    }

    /**
     * All purchased products
     */
    public function purchasedProducts(): static
    {
        $this->query->whereHas('orders');
        return $this;
    }

    /**
     * Most purchased products
     * @param int $take - specify how many products to return.
     */
    public function topProducts(int $take = 5): Collection|array
    {
        return $this->query->join('order_items', 'products.id', '=', 'order_items.product_id')
            ->select('products.*', DB::raw('count(order_items.product_id) as count'))
            ->groupBy('products.id')
            ->orderBy('count', 'DESC')
            ->take($take)
            ->get();
    }

    /**
     * Get all products in a given brand
     * @param string $brand - product brand
     */
    public function productsByBrand(string $brand): static
    {
        $this->query->where('brand', $brand);
        return $this;
    }

    /**
     * Get all products in a given brand
     * @param string $category - product brand
     */
    public function productsByCategory(string $category): static
    {
        $this->query->where('category', $category);
        return $this;
    }

    /**
     * Get the products that are out of stock.
     */
    public function outOfStock(): static
    {
        $this->query->where('stock_quantity', 0);
        return $this;
    }

    /**
     * Get the products that are NOT out of stock.
     */
    public function inStock(): static
    {
        $this->query->whereNot('stock_quantity', 0);
        return $this;
    }

    public function get(): Collection|array
    {
        return $this->query->get();
    }
}
