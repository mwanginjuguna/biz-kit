<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class WishlistActions extends Component
{
    public Collection $wishlist;

    #[On('add-to-wishlist')]
    public function addToWishlist(Product $product)
    {
        $this->wishlist->add([$product->name => $product->only(['id', 'name', 'price', 'category', 'brand'])]);
        $this->updateWishlist();
    }

    #[On('remove-from-wishlist')]
    public function removeFromWishlist(Product $product)
    {
        $this->wishlist->forget($product->name);
        $this->updateWishlist();
    }

    public function updateWishlist()
    {
        session()->put('wishlist', $this->wishlist);
    }

    public function mount()
    {
        $this->wishlist = session()->get('wishlist', new Collection);
    }

    public function render()
    {
        return view('livewire.wishlist-actions');
    }
}
