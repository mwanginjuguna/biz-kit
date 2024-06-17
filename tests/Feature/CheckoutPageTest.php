<?php

use App\Livewire\CartActions;
use App\Models\Order;
use App\Models\Product;
use Livewire\Features\SupportTesting\Testable;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = getUser();
    $this->product = Product::factory()->create();
});

test('it renders checkout page with the cart populated', function () {
    // initialize cart items
    $cart = createCart($this->product->id);

    expect($cart->getData()['cartTotal'])->toEqual($this->product->price);

    $response = $this->actingAs($this->user)->get(route('checkout'));

    $response->assertStatus(200)
        ->assertViewIs('pages.orders.checkout')
        ->assertSeeLivewire('orders.checkout');
});

test('it requires authenticated user to access checkout page', function () {
    $this->get(route('checkout'))
        ->assertStatus(302)
        ->assertRedirectToRoute('login');
});

test('it requires the cart to be set in session', function () {
    $this->actingAs($this->user)
        ->get(route('checkout'))
        ->assertStatus(302)
        ->assertRedirectToRoute('cart');
});

test('it creates a new order using the items set in the cart value in session', function () {
    $cart = createCart($this->product->id);

    $response = $this->actingAs($this->user)
        ->get(route('checkout'));

    $response->assertOk();

    $order = Order::first();

    expect($order->products->first()->id)->toBe($this->product->id)
        ->and($order->total)->toEqual($cart->getData()['cartTotal']);
});

test('it renders checkout page to pay an existing unpaid order', function () {
    $order = Order::factory()->create([
        'is_paid' => false
    ]);

    $this->actingAs($this->user)
        ->get(route('orders.checkout', $order))
        ->assertOk();
});

function createCart($productId): Testable
{
    return Livewire::test(CartActions::class)
        ->dispatch('add-to-cart', productId: $productId, quantity: 1);
}
