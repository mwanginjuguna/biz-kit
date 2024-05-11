<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartView extends Component
{
    public Cart $cart;

    public array $cartItems = [];

    public function addToCart(Product $product, int $quantity = 1): void
    {
        $item = [
            'product' => $product->only(['id', 'name', 'price']),
            'quantity' => $quantity
        ];
        // update or create cart item
        if (Arr::exists($this->cartItems, $product->name)) {
            $this->cartItems[$product->name]['quantity'] += $quantity;
        } else {
            Arr::add($this->cartItems, $product->name, $item);
        }

        $this->updateCart();
    }

    public function removeFromCart(Product $product, int $quantity = 1): void
    {
        $item = $this->cartItems[$product->name];

        if ($item['quantity'] > $quantity) {
            $this->cartItems[$product->name]['quantity'] -= $quantity;
        } else {
            unset($this->cartItems[$product->name]);
        }

        $this->updateCart();
    }

    public function updateCart()
    {
        session()->put('cart', collect(Arr::map($this->cartItems, fn($item) => [
                'product' => $item['product'],
                'user_id' => Auth::user()->id ?? null,
                'quantity' => $item['quantity'],
                'subtotal' => $item['product']['price'] * $item['quantity']
            ])));
    }

    public function render()
    {
        // $this->js('initializeCart()');
        return view('livewire.cart-view', [
            "topProducts" => Product::query()->latest()->limit(5)->get()
        ]);
    }
}
