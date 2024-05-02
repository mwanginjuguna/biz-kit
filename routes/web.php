<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/services', 'welcome')->name('services');
Route::get('/blog', [PostController::class, 'index'])->name('blog');
Route::view('/contact-me', 'welcome')->name('contact-me');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'admin', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/posts', [AdminController::class, 'posts'])->name('admin.posts');
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/posts/new', [PostController::class, 'create'])->name('post.new');
    Route::post('/admin/posts/new', [PostController::class, 'store'])->name('post.store');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::patch('/admin/posts/{post}/edit', [PostController::class, 'update'])->name('post.update');
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy'])->name('post.destroy');
});

Route::get('/blog/{post}', [PostController::class, 'show'])->name('post.show');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
