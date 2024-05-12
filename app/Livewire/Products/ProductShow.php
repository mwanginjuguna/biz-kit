<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductShow extends Component
{
    public Product $product;

    public function addToWishlist()
    {
        $this->dispatch('add-to-wishlist', product: $this->product);
    }

    public function addToCart()
    {
        $this->dispatch('add-to-cart', product: $this->product);
    }

    public function removeFromCart()
    {
        $this->dispatch('remove-from-cart', product: $this->product);
    }



    public function render()
    {
        return view('livewire.products.product-show');
    }
}
