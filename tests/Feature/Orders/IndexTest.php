<?php

use App\Livewire\Orders\Index;
use App\Models\Order;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = getUser();
    $this->admin = getUser(role: 'A');

    $this->anotherUser = \App\Models\User::factory()->create();

    Order::factory(5)->create(['user_id' => $this->user->id]);
    Order::factory(5)->create(['user_id' => $this->anotherUser->id]);
});

it('does not render the orders index page for non-authenticated users', function () {
    $response = $this->get(route('orders.index'));

    $response->assertRedirect();
    $response->assertRedirectToRoute('login');
});

it('renders the orders index page', function () {
    $response = $this->actingAs($this->user)->get(route('orders.index'));

    $response->assertOk();
    $response->assertViewIs('pages.orders.index');
});

it('renders the orders index page with orders', function () {
    $response = $this->actingAs($this->user)->get(route('orders.index'));

    $response->assertOk();
    $response->assertViewHas('orders');
});

it('renders the livewire component orders.index inside orders index page', function () {
    $response = $this->actingAs($this->user)->get(route('orders.index'));
    $response->assertOk();

    $component = Livewire::test(Index::class);
    $component->assertOk();
    $component->assertViewIs('livewire.orders.index');
    $component->assertViewHas('orders');
});

it('shows only the orders belonging to the authenticated user and not other users', function () {
    $order = Order::query()->where('user_id', $this->user->id)->first();
    $otherUserOrder = Order::query()->where('user_id', $this->anotherUser->id)->first();

    $response = $this->actingAs($this->user)->get(route('orders.index'));

    $response->assertOk();

    $component = Livewire::test(Index::class);
    $component->assertOk();
    $component->assertSee($order->order_number)->assertSee(number_format($order->total, 2));
    $component->assertDontSee($otherUserOrder->order_number)->assertDontSee(number_format($otherUserOrder->total, 2));
});

it('shows all the orders belonging to all users for admin users', function () {
    $order = Order::query()->where('user_id', $this->user->id)->first();
    $otherUserOrder = Order::query()->where('user_id', $this->anotherUser->id)->first();

    $response = $this->actingAs($this->admin)->get(route('orders.index'));

    $response->assertOk();

    $component = Livewire::test(Index::class);
    $component->assertOk();
    $component->assertSee($order->order_number)->assertSee(number_format($order->total, 2));
    $component->assertSee($otherUserOrder->order_number)->assertSee(number_format($otherUserOrder->total, 2));
});
