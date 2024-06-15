<?php

use App\Livewire\CartActions;
use App\Livewire\Products\ProductShow;
use App\Models\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

beforeEach(function () {
    $this->product = Product::factory()->create();
});

test('it can render the product page', function () {
    $this->get(route('products.show', $this->product->slug))
        ->assertOk();
});

test('it renders the correct view to show a product', function () {
    $this->get(route('products.show', $this->product->slug))
        ->assertOk()
        ->assertViewIs('pages.products.show');
});

test('it renders the correct view with the right product', function () {
    $this->get(route('products.show', $this->product->slug))
        ->assertOk()
        ->assertViewIs('pages.products.show')
        ->assertViewHas('product')
        ->assertSee($this->product->name);
});

test('it renders the livewire component to show a product in the product view', function () {
    $this->get(route('products.show', $this->product->slug))
        ->assertOk()
        ->assertSeeLivewire('products.product-show');
});

test('it renders the similar products component with similarProducts in the product view', function () {
    Product::factory(6)->create([
        'category' => $this->product->category
    ]);

    $response = $this->get(route('products.show', $this->product->slug))
        ->assertOk()
        ->assertViewHas('similarProducts');

    expect($response['similarProducts']->count())
        ->toBe(5)
        ->and($response['similarProducts']->first()->category)
        ->toBe($this->product->category);
});

test('the view renders the livewire product.show component with product variable initialized', function () {
    $this->get(route('products.show', $this->product->slug))
        ->assertViewIs('pages.products.show')
        ->assertOk();

    Livewire::test(ProductShow::class, ["product" => $this->product])
        ->assertSet('product', $this->product)
        ->assertSee([$this->product->name, number_format($this->product->price, 2)]);
});

test("the livewire component can dispatch an event to add a product to cart", function () {
    Livewire::test(ProductShow::class, ["product" => $this->product])
        ->call('addToCart')
        ->assertDispatched('add-to-cart', productId: $this->product->id);
});

test("the livewire component can dispatch an event to remove a product to cart", function () {
    Livewire::test(ProductShow::class, ["product" => $this->product])
        ->assertOk()
        ->call('removeFromCart')
        ->assertDispatched('remove-from-cart', productId: $this->product->id);
});
