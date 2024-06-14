<?php

use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Builder;

test('products page is rendered successfully for guest user', function () {
    $response = $this->get(route('products'));

    $response->assertStatus(200);
});

test('it renders products view with the products from the database', function () {
    $response = $this->get(route('products'), ['products' => createProducts(5)]);

    $response->assertOk();

    $response->assertViewIs('pages.products.index');
    $response->assertViewHas('products');
});

test('it renders products view with pagination of products', function () {
    $response = $this->get(route('products'), ['products' => createProducts(50)]);
    $product = getProducts()->first();

    $response->assertOk();
    $response->assertViewHas('products');
    $response->assertSee($product->name);

    $products = $response->original->getData()['products'];

    expect($products)->toBeInstanceOf(Paginator::class)
        ->and(count($products))->toEqual(30);
});

test("it renders admin's products index page", function () {
    $response = $this->actingAs(getUser('A'))->get(route('admin.products'));

    $response->assertOk();
    $response->assertViewIs('admin.products.index');
});

test("admin's products index page is not accessible to guest user and redirects to login", function () {
    $response = $this->get(route('admin.products'));

    $response->assertStatus(302);
    $response->assertRedirectToRoute('login');
});

test("admin's products index page is not accessible to unauthorized user and redirects to dashboard", function () {
    $response = $this->actingAs(getUser())->get(route('admin.products'));

    $response->assertStatus(302);
    $response->assertRedirectToRoute('dashboard');
});

test("it renders admin's products index page with products", function () {
    createProducts(5);

    $response = $this->actingAs(getUser('A'))->get(route('admin.products'));

    $product= getProducts()->first();

    $response->assertOk();
    $response->assertViewIs('admin.products.index');
    $response->assertViewHas('products');

    $response->assertSee([$product->name, $product->category, $product->price]);
});

function getProducts(): Builder
{
    return Product::query();
}

function createProducts(int $count = 3, $attr = [])
{
    return Product::factory($count)->create($attr);
}
