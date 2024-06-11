<?php

test('non-admin user is redirected to the default dashboard', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this->actingAs($user)->get('/admin/dashboard');

    $response->assertStatus(302)->assertRedirect(route('dashboard'));
});

test('admin dashboard is rendered for admin user', function () {
    $user = \App\Models\User::factory()->create([
        'role' => 'A'
    ]);

    $response = $this->actingAs($user)->get('/admin/dashboard');

    $response->assertStatus(200);
});

test('admin dashboard is populated with stats for orders, products, users, and posts', function () {
    $admin = \App\Models\User::factory()->create([
        'role' => 'A'
    ]);
    $users = \App\Models\User::factory(4)->create();
    $orders = \App\Models\Order::factory()->count(3)->create([
        'user_id' => $users->random(1)->id
    ]);

    $posts = \App\Models\Post::factory(3)->create();

    $products = \App\Models\Product::factory(3)->create();
//    [
//        'posts', 'productsCount', 'stocked', 'topProducts',
//        'purchasedProducts', 'ordersCount', 'pendingOrders',
//        'customers', 'usersCount', 'users', 'messages'
//    ]

    $response = $this->actingAs($admin)->get('/admin/dashboard', [
        'posts' => $posts,
        'productsCount' => $products,
        'stocked' => $products->where('stock_quantity', '>', 0),
        'ordersCount' => $orders->count(),
        'pendingOrders' => $orders->where('status', 'pending')->count(),
        'usersCount' => $users->count(),
        'users' => $users->latest()->take(5)->get(),
        'messages' => App\Models\ContactMessage::factory()->create(3)
    ]);

    expect('view')->toBe('admin.dashboard');

    $response->dd();

    $response->assertStatus(200);
});
