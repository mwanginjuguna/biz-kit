<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProductsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/services', 'welcome')->name('services');
Route::view('/products', 'welcome')->name('products');
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::view('/contact-me', 'welcome')->name('contact-me');

// auth routes
Route::middleware('auth')->group(function () {
    Route::get('/products/add', [ProductController::class, 'create'])->name('products.add');
    Route::post('/products/add', [ProductController::class, 'store'])->name('products.store');
});


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // admin posts
    Route::get('/admin/posts', [AdminController::class, 'posts'])->name('admin.posts');
    Route::get('/admin/posts/new', [PostController::class, 'create'])->name('post.new');
    Route::post('/admin/posts/new', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/admin/posts/{post}/edit', [PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');

    // admin products
    Route::get('/admin/products', [AdminProductsController::class, 'products']);
    // admin orders

});

Route::get('/blog/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
