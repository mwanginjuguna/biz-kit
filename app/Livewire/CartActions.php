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

    public float|int $cartTotal = 0.00;

    public function mount()
    {
        $this->cart = session()->get('cart', new Collection);
    }

    #[On('add-to-cart')]
    public function addToCart(int $productId, int $quantity = 1)
    {
        $product = Product::findOrFail($productId);

        if (!is_null($this->cart->get($product->name, null))) {
            $item = $this->cart->get($product->name);
            $item['quantity'] += $quantity;
            $item['subtotal'] = $item['product']['price'] * $item['quantity'];
            $item['image'] = $product->image;
            $this->cart->put($product->name, $item);
        } else {
            $this->cart->put(
                $product->name, [
                    'product' => $product->only(['id', 'name', 'price']),
                    'quantity' => $quantity,
                    'image' => $product->image,
                    'user_id' => Auth::user()->id ?? null,
                    'subtotal' => $product->price * $quantity
                ]
            );
        }

        $this->updateCart();
    }

    #[On('remove-from-cart')]
    public function removeFromCart(int $productId, int $quantity = 1)
    {
        $product = Product::findOrFail($productId);

        $item = $this->cart->get($product->name);

        if ($item['quantity'] > $quantity) {
            $item['quantity'] -= $quantity;
            $this->cart->put($product->name, $item);
        } else {
            $this->cart->forget($product->name);
        }

        $this->updateCart();
    }

    private function updateCart()
    {
        $this->cartTotal = $this->cart->map(fn($item) => $item['subtotal'])->sum();

        session()->put('cart-total', $this->cartTotal);

        session()->put('cart', $this->cart);
    }

    public function render()
    {
        $this->cartItemsCount = $this->cart->count();

        return view('livewire.cart-actions');
    }
}
