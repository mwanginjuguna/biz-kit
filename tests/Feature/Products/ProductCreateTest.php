<?php

use App\Livewire\Products\ProductCreate;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Livewire;

test('it renders the product create form', function () {
    $response = $this->actingAs(getUser('A'))->get(route('products.add'));

    $response->assertStatus(200);
    $response->assertViewIs('admin.products.create');
});

test("products create page is not accessible to guest user and redirects to login", function () {
    $response = $this->get(route('products.add'));

    $response->assertStatus(302);
    $response->assertRedirectToRoute('login');
});

test("products create page is not accessible to unauthorized user and redirects to dashboard", function () {
    $response = $this->actingAs(getUser())->get(route('products.add'));

    $response->assertStatus(302);
    $response->assertRedirectToRoute('dashboard');
});

test("products create page calls the products.product-create livewire component", function () {
    $response = $this->actingAs(getUser('A'))->get(route('products.add'));

    $response->assertOK();

    $component = Livewire::test(ProductCreate::class);

    $component->assertOk();
    $component->assertSee('form');
});

test('it can populate ProductCreateForm and save product to database', function () {
    $response = $this->actingAs(getUser('A'))->get(route('products.add'));

    $response->assertOK();

    $component = Livewire::test(ProductCreate::class);

    $component->set('form.name', 'Product Name Test');
    $component->set('form.slug', 'product-name-test');
    $component->set('form.category', 'Laravel');
    $component->set('form.brand', 'Pest');
    $component->set('form.price', 120.50);
    $component->set('form.description', 'This is a test product worth 120.50');
    $component->set('form.stock_quantity', 12);
    $component->set('form.return_policy', '14 Days');
    $component->set('form.shipped_from', 'Mars');
    $component->set('imagePath', 'products/random-image.jpg');

    $component->call('productSave')->assertOk()
        ->assertHasNoErrors();

    $product = Product::query()->first();
    expect(Product::count())->toBe(1)->and($product->name)->toBe('Product Name Test');
});

test('it can validate product creation form', function () {
    $response = $this->actingAs(getUser('A'))->get(route('products.add'));

    $response->assertOK();

    $component = Livewire::test(ProductCreate::class);

    $component->call('productSave')
        ->assertHasErrors(['form.name', 'form.description']);

    $testProductName = 'Error validation product';
    $component->fill([
        'form.name' => $testProductName,
        'form.description' => 'description for error validation product'
    ])->assertSet('form.name', $testProductName)
    ->call('productSave')->assertHasNoErrors();
});

test('it uploads the main product image', function () {
    $response = $this->actingAs(getUser('A'))->get(route('products.add'));

    Storage::fake('images');

    $image = \Illuminate\Http\UploadedFile::fake()->image('test-image.png');
    $testProductName = 'Error validation product';

    $response->assertOK();

    $component = Livewire::test(ProductCreate::class);

    $component
        ->fill([
            'productImage' => $image,
            'form.name' => $testProductName,
            'form.description' => 'description for error validation product'
        ])
        ->call('productSave')
        ->assertHasNoErrors();

    $product = Product::query()->first();

    expect($product->name)->toBe($testProductName)
        ->and($product->image)->toBe('products/test-image.png');

    Storage::disk('public')->assertExists('products/test-image.png');
});
