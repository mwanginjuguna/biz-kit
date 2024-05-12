<?php

namespace App\Livewire;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartView extends Component
{
    public Collection $cart;

    public array $cartItems = [];
    public float $cartTotal = 0.01;

    public string $discountCode = '';

    private Collection $discount;

    public function applyDiscount()
    {
        if ($this->discountValid($this->discountCode)) {
            $this->cartTotal *= (1-$this->discount->rate);
        }
    }

    private function discountValid(string $code): bool
    {
        $this->discount = Discount::query()->firstWhere('code', '=', $this->discountCode)->get();
        return $this->discount->isEmpty();
    }

    public function addToWishlist(Product $product): void
    {
        $this->dispatch('add-to-wishlist', product: $product);
    }

    public function addToCart(Product $product, int $quantity = 1): void
    {
        $this->dispatch('add-to-cart', $product, $quantity);
        dd('dispatched');
    }

    public function removeFromCart(Product $product, int $quantity = 1): void
    {
        $this->dispatch('remove-from-cart', $product, $quantity);
        $this->updateCart();
    }

    public function deleteCart()
    {
        session()->forget('cart');
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->cart = session()->get('cart', new Collection);

        $this->cartTotal = session()->get('cart-total', 0.01);
    }

    public function clearCart()
    {
        session()->forget('cart');
        session()->forget('cart-total');

        $this->updateCart();
    }

    public function mount()
    {
        $this->cart = session()->get('cart', new Collection);

        $this->cartTotal = session()->get('cart-total', 0.01);
    }

    public function render()
    {
        // $this->js('initializeCart()');
        return view('livewire.cart-view', [
            "topProducts" => Product::query()->latest()->limit(5)->get()
        ]);
    }
}
