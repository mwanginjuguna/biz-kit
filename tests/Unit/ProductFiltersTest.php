<?php

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Actions\ProductFilters;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(Tests\TestCase::class, RefreshDatabase::class);

test('it filters products by brand', function () {
    Product::factory(5)->create([
        'brand' => 'Test'
    ]);

    $products = (new ProductFilters())->productsByBrand('Test')->get();

    expect($products->count())
        ->toBe(5)
        ->and($products->first()->brand)
        ->toBe('Test');
});

test('it filters products by category', function () {
    Product::factory(5)->create([
        'category' => 'Test'
    ]);

    $products = (new ProductFilters())->productsByCategory('Test')->get();

    expect($products->count())
        ->toBe(5)
        ->and($products->first()->category)
        ->toBe('Test');
});

test('it filters all stocked products', function () {
    Product::factory(5)->create([
        'stock_quantity' => 10
    ]);

    $products = (new ProductFilters())->inStock()->get();

    expect($products->count())
        ->toBe(5)
        ->and($products->first()->stock_quantity)
        ->toBe(10)
        ->and($products->where('stock_quantity', '=',0)->count())
        ->toBe(0);
});

test('it filters all products out of stock', function () {
    Product::factory(5)->create([
        'stock_quantity' => 0
    ]);

    $products = (new ProductFilters())->outOfStock()->get();

    expect($products->count())
        ->toBe(5)
        ->and($products->first()->stock_quantity)
        ->toBe(0)
        ->and($products->where('stock_quantity', '=',0)->count())
        ->toBe(5);
});

test('it filters all the purchased products', function () {
    $products = Product::factory(2)->create([
        'stock_quantity' => rand(3, 10)
    ]);

    foreach ($products as $product) {
        $order = Order::factory()->create();

        OrderItem::factory()->create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'subtotal' => $product->price
        ]);
    }

    $purchased = (new ProductFilters())->purchasedProducts()->get();

    expect($purchased->count())->toEqual($products->count());
});

test('it filters top products', function () {
    $products = Product::factory(8)->create([
        'stock_quantity' => rand(3, 10)
    ]);

    // Loop over all the products, and make half of them to be bought twice
    foreach ($products as $product) {
        if ($product->id < $products->count()/2) {
            // create another order with this product else create the product once
            $order = Order::factory()->create();

            OrderItem::factory()->create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => 1,
                'subtotal' => $product->price
            ]);
        }

        $order = Order::factory()->create();

        OrderItem::factory()->create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'quantity' => 1,
            'subtotal' => $product->price
        ]);
    }

    $topProducts = (new ProductFilters())->topProducts();

    expect($topProducts->count())
        ->toEqual(5)
        ->and($topProducts->first()->count)
        ->toBe(2);
});
