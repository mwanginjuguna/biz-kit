<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductShow extends Component
{
    public Product $product;

    public function addToWishlist()
    {
        $this->dispatch('add-to-wishlist', productId: $this->product->id);
    }

    public function addToCart()
    {
        $this->dispatch('add-to-cart', productId: $this->product->id);
    }

    public function removeFromCart()
    {
        $this->dispatch('remove-from-cart', productId: $this->product->id);
    }

    public function render()
    {
        return view('livewire.products.product-show');
    }
}
