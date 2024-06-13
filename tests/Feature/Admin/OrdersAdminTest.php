<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

beforeEach(function () {
    $this->user = getUser();
    $this->admin = getUser(role: 'A');
});

function stats(): \Illuminate\Support\Collection
{
    $user = User::factory()->create();
    User::factory(5)->create();
    Order::factory(4)->create([
        'user_id' => $user->id
    ]);
    Product::factory(4)->create();

    return collect([
        'orders' => Order::query(),
        'products' => Product::query(),
        'users' => User::query()->whereNot('role', '=', 'A'),
        'customers' => Order::query()->selectRaw('count(distinct user_id) as customers')->get()->first()->customers
    ]);
}

test('admin orders page can be rendered', function () {
    $response = $this->actingAs($this->admin)->get('/admin/orders');

    $response->assertStatus(200);
});

test('non-admin cannot access orders page', function () {
    $response = $this->actingAs($this->user)->get('/admin/orders');

    $response->assertStatus(302)->assertRedirect('/dashboard');
});

test('admin orders page renders the correct view', function () {
    $data = stats();

    $response = $this->actingAs($this->admin)->get('/admin/orders', [
        'products' => $data['products']->count(),
        'purchasedProducts' => 5,
        'orders' => $data['orders']->get(),
        'customers' => $data['customers'],
        'users' => $data['users']->count(),
    ]);

    $response->assertOk();
    $response->assertViewIs('admin.orders.index');
    $response->assertViewHas(['products', 'users', 'orders']);
});

test('admin orders page shows stats for orders and sales', function () {
    $data = stats();

    $response = $this->actingAs($this->admin)->get('/admin/orders', [
        'products' => $data['products']->count(),
        'purchasedProducts' => 5,
        'orders' => $data['orders']->get(),
        'customers' => $data['customers'],
        'users' => $data['users']->count(),
    ]);

    $response->assertOk();
    $response->assertSee(number_format($data['orders']->sum('total'), 2));
    $response->assertSee($data['products']->count());
});

test('admin orders view renders the livewire orders-index component to display a paginated list of orders', function () {
    $data = stats();

    $response = $this->actingAs($this->admin)->get('/admin/orders', [
        'products' => $data['products']->count(),
        'purchasedProducts' => 5,
        'orders' => $data['orders']->get(),
        'customers' => $data['customers'],
        'users' => $data['users']->count(),
    ]);

    $response->assertOk();

    $component = \Livewire\Livewire::test(\App\Livewire\Orders\Index::class);

    $component->assertOk();
    $component->assertSee($data['orders']->first()->order_number);
    $component->assertViewHas('orders');
});
