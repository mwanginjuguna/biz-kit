<?php

use App\Models\Order;
use Illuminate\Support\Carbon;

beforeEach(function () {
    $this->user = getUser();
    $this->admin = getUser(role: 'A');
});

function getUser(string $role = 'U'): \App\Models\User {
    return \App\Models\User::factory()->create([
        'role' => $role
    ]);
}

test('non-admin user is redirected to the default dashboard', function () {
    //dd($this->user);
    $response = $this->actingAs($this->user)->get('/admin/dashboard');

    $response->assertStatus(302)->assertRedirect('/dashboard');
});

test('admin dashboard is rendered for admin user', function () {
    $response = $this->actingAs($this->admin)->get('/admin/dashboard');

    $response->assertStatus(200);
});

test('admin dashboard is populated with stats for orders, products, users, and posts', function () {
    // arrange
    $users = \App\Models\User::factory(4)->create();
    $orders = \App\Models\Order::factory()->count(3)->create([
        'user_id' => $this->user->id
    ]);
    $tag = \App\Models\Tag::factory()->create();
    $category = \App\Models\Category::factory()->create();
    $posts = \App\Models\Post::factory(3)->create([
        'category_id' => $category->id,
        'tag_id' => $tag->id,
        'user_id' => $this->user->id
    ]);
    $products = \App\Models\Product::factory(3)->create();

    // act
    $response = $this->actingAs($this->admin)->get('/admin/dashboard', [
        'posts' => $posts,
        'productsCount' => $products,
        'stocked' => $products->where('stock_quantity', '>', 0)->count(),
        'ordersCount' => $orders->count(),
        'pendingOrders' => $orders->where('status', 'pending')->count(),
        'usersCount' => $users->count(),
        'users' => $users,
        'messages' => App\Models\ContactMessage::factory(3)->create()
    ]);
    $postViews = number_format($posts->sum('views'), 0);

    // assertions
    $response->assertOk();
    $response->assertViewIs('admin.dashboard')
        ->assertViewHas(['posts', 'productsCount', 'stocked', 'ordersCount', 'pendingOrders', 'usersCount', 'users', 'messages'])
        ->assertSee($postViews, false)
        ->assertSee($posts->first()->title);
});

it('contains livewire sales component and can update component values and call component methods', function () {
    // arrange
    $orders = \App\Models\Order::factory()->count(3)->create([
        'user_id' => $this->user->id
    ]);
    $products = \App\Models\Product::factory(3)->create();
    $ordersPerYear = Order::query()
        ->getYearOrders(now()->year)
        ->oldest()
        ->get(['order_number', 'total', 'created_at'])
        ->groupBy(
            fn($order) => Carbon::parse($order->created_at)->monthName
        )->all();
    $months = collect($ordersPerYear)->keys()->toArray();
    $topProducts = $products->take(2);

    // act
    $component = \Livewire\Livewire::test(\App\Livewire\Charts\Sales::class, [
        "ordersCount" => $orders->count(),
        "productsCount" => $products->count(),
        "topProducts" => $topProducts,
        "purchasedProducts" => $products->take(2)->count(),
    ]);

    // asserts
    $component->assertOk();
    $component->assertSet('topProducts', $topProducts);

    // ensure livewire updates the chart values
    $component->call('getYearOrders');

    $component->assertSee(number_format($orders->sum('total'), 2));
    $component->assertSet('months', $months);
});
