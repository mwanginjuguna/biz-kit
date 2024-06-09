<?php

test('dashboard cannot be rendered for unauthenticated users', function () {
    $response = $this->get('/dashboard');

    $response->assertStatus(302);
    $response->assertRedirect(route('login'));
});

test('dashboard can be rendered for authenticated user', function () {
    $user = \App\Models\User::factory()->create();

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(200);
    $response->assertSee('Dashboard');
});

test("user's name is displayed on the dashboard", function () {
    $user = \App\Models\User::factory()->create();

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(200);
    $response->assertSee($user->name);
});

test("Order stats for the user are displayed.", function () {
    $user = \App\Models\User::factory()->create();
    $orders = \App\Models\Order::factory()->count(3)->create([
        'user_id' => $user->id
    ]);

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(200);
    $response->assertSee($orders->count());
});
