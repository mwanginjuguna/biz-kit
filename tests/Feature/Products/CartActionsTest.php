<?php

use App\Livewire\CartActions;
use App\Livewire\Products\ProductShow;
use App\Models\Product;
use Livewire\Livewire;

beforeEach(function () {
    $this->product = Product::factory()->create();
});

test('user can add products to cart', function () {
    $cart = Livewire::test(CartActions::class);

    expect($cart->getData()['cartTotal'])->toEqual(0);

    Livewire::test(ProductShow::class, ['product' => $this->product])
        ->call('addToCart')
        ->assertDispatched('add-to-cart', productId: $this->product->id);

    $cart->dispatch('add-to-cart', productId:$this->product->id, quantity: 1);

    expect($cart->getData()['cartTotal'])->toEqual($this->product->price);
});

test('user can remove products to cart', function () {
    $cart = Livewire::test(CartActions::class);

    expect($cart->getData()['cartTotal'])->toEqual(0);

    $cart->dispatch('add-to-cart', productId:$this->product->id, quantity: 1);

    expect($cart->getData()['cartTotal'])->toEqual($this->product->price);

    $cart->dispatch('remove-from-cart', productId:$this->product->id, quantity: 1);

    expect($cart->getData()['cartTotal'])->toEqual(0);
});

test('cart is always empty if no products are added', function () {
    $cart = Livewire::test(CartActions::class);

    expect($cart->getData()['cartTotal'])->toEqual(0);
});
