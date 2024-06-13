<?php


beforeEach(function () {
    $this->user = getUser();
});

test('order view is rendered', function () {
    $order = \App\Models\Order::factory()->create([
        'user_id' => $this->user
    ]);

    $response = $this->actingAs($this->user)->get(route('orders.show', $order->id));

    $response->assertStatus(200);
    $response->assertViewIs('pages.orders.show');
});

test('a non-authenticated user cannot view order page', function () {
    $order = \App\Models\Order::factory()->create([
        'user_id' => $this->user
    ]);

    $response = $this->get(route('orders.show', $order->id));

    $response->assertStatus(302);
    $response->assertRedirectToRoute('login');
});

test('the view renders livewire component to show an order', function () {
    $order = \App\Models\Order::factory()->create([
        'user_id' => $this->user
    ]);

    $response = $this->actingAs($this->user)->get(route('orders.show', $order->id));

    $response->assertOk();

    $component = \Livewire\Livewire::test(\App\Livewire\Orders\Show::class, ['order' => $order]);

    $component->assertOk();
    $component->assertSet('order', $order);
    $component->assertViewHas('order');
    $component->assertSee($order->order_number)->assertSee(number_format($order->total, 2));
});

test('the order view contains the order', function () {
    $order = \App\Models\Order::factory()->create([
        'user_id' => $this->user
    ]);

    $response = $this->actingAs($this->user)->get(route('orders.show', $order->id));

    $response->assertOk();
    $response->assertViewHas('order');
    $response->assertSee($order->order_number)->assertSee(number_format($order->total, 2));
});
