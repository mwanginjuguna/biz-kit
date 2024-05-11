<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class CartActions extends Component
{
    public Collection $cart;

    public int $cartItemsCount = 0;

    public function mount()
    {
        $this->cart = session()->get('cart', new Collection);
    }

    #[On('add-to-cart')]
    public function addToCart(Product $product, int $quantity = 1)
    {
        $this->cart->put(
            $product->name, [
                'product' => $product->only(['id', 'name', 'price']),
                'quantity' => $quantity,
                'user_id' => Auth::user()->id ?? null,
                'subtotal' => $product->price * $quantity
            ]
        );

        $this->updateCart();
    }

    #[On('remove-from-cart')]
    public function removeFromCart(Product $product, int $quantity = 1)
    {
        $item = $this->cart->get($product->name);

        if ($item->quantity > $quantity) {
            $item->quantity -= $quantity;
            $this->cart->put($product->name, $item);
        } else {
            $this->cart->forget($product->name);
        }

        $this->updateCart();
    }

    private function updateCart()
    {
        session()->put('cart', $this->cart);
    }

    public function render()
    {
        $this->cartItemsCount = $this->cart->count();

        return view('livewire.cart-actions');
    }
}
