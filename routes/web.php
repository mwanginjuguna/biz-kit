<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
Route::view('/services', 'welcome')->name('services');
Route::view('/blog', 'welcome')->name('blog');
Route::view('/contact-me', 'welcome')->name('contact-me');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
