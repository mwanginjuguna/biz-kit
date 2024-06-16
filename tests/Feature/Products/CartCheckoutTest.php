<?php

use App\Livewire\CartActions;
use App\Livewire\CartView;
use App\Models\Product;
use Livewire\Livewire;

beforeEach(function () {
    $this->product = Product::factory()->create();
});

test('cart view is rendered with corresponding Livewire cart component', function () {
    $this->get('/cart')
        ->assertOk()
        ->assertViewIs('pages.cart')
        ->assertSeeLivewire('cart-view');
});

test('livewire cart view dispatches events to add an item to cart', function () {
    $component = Livewire::test(CartView::class);

    $component->assertOk()
        ->call('addToCart', productId: $this->product->id, quantity: 1)
        ->assertRedirectToRoute('cart');
});

test('livewire cart view dispatches events to delete an item from cart', function () {
    $component = Livewire::test(CartView::class);

    $component->assertOk()
        ->call('addToCart', productId: $this->product->id, quantity: 1)
        ->assertRedirectToRoute('cart');
});

test('cart view contains cart items', function () {
    $cart = Livewire::test(CartActions::class)
        ->dispatch('add-to-cart', productId:$this->product->id, quantity:1);

    expect($cart->getData()['cartTotal'])->toEqual($this->product->price);

    Livewire::test(CartView::class)
        ->assertOk()
        ->assertSessionHas('cart')
        ->assertSet('cartTotal', $this->product->price);
});
