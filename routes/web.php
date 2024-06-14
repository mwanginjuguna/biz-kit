<?php

use App\Http\Controllers\ActionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\Mpesa\C2BController;
use App\Http\Controllers\Mpesa\StkPushController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/services', 'pages.about')->name('services');
Route::view('/privacy-policy', 'pages.about')->name('privacy-policy');
Route::view('/terms-and-conditions', 'pages.about')->name('terms-and-conditions');
Route::view('/gallery/videos', 'pages.videos')->name('videos');
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/shop', [ProductController::class, 'index'])->name('shop');
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::view('/contact', 'pages.contact')->name('contact-me');

Route::get('/cart', [ActionsController::class, 'cart'])->name('cart');

// auth routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ActionsController::class, 'dashboard'])->name('dashboard');

    // checkout & orders
    Route::get('/checkout', [ActionsController::class, 'checkout'])->name('checkout');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/checkout/{order}', [ActionsController::class, 'checkout'])->name('orders.checkout');
    Route::get('/orders/order/{order}', [OrderController::class, 'show'])->name('orders.show');

    // lipa na mpesa
    Route::post('/orders/pay/mpesa/stk-push', [StkPushController::class, 'stkInit'])->name('mpesa.stk-push');
});

// admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/orders', [AdminController::class, 'orders'])->name('admin.orders');

    // admin posts
    Route::get('/admin/posts', [AdminController::class, 'posts'])->name('admin.posts');
    Route::get('/admin/posts/new', [PostController::class, 'create'])->name('post.new');
    Route::post('/admin/posts/new', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/admin/posts/{post}/edit', [PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    // admin products
    Route::get('/admin/products', [AdminProductsController::class, 'products'])->name('admin.products');
    // add products
    Route::get('/admin/products/add', [ProductController::class, 'create'])->name('products.add');
    Route::post('/admin/products/add', [ProductController::class, 'store'])->name('products.store');
    Route::get('/admin/products/edit/{product:slug}', [AdminProductsController::class, 'editProduct'])->name('admin.products.edit');

    // admin orders

    // activate mpesa urls for lipa na mpesa notifications
    Route::post('/mpesa/c2b/register-urls', [C2BController::class, 'registerURLS'])->name('c2b.registerUrls');
});

Route::get('/blog/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::controller(PaymentsController::class)->group(function () {
    Route::get('/orders/order/make-payment/{order}', 'pay')->name('make-payment');
    Route::get('/orders/order/cancel-payment/{order}', 'cancel')->name('payment.cancel');
    Route::get('/orders/order/payment-success/{order}', 'success')->name('payment.success');
})->middleware('auth');

require __DIR__.'/auth.php';
