<?php

use App\Http\Controllers\Mpesa\C2BController;
use App\Http\Controllers\Mpesa\StkPushController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix'=>'paypal'], function () {

    Route::post('/order/{order}/pay', [PaymentsController::class, 'pay'])
        ->name('paypal.pay'); // 'api/paypal/order/{id}/pay'

    Route::post('/order/{order}/capture', [PaymentsController::class, 'capture'])
        ->name('paypal.capture');
});

Route::post('/cb/confirm/payment', [StkPushController::class, 'stkConfirm'])->name('stkPush.confirm');

// c2b routes
Route::post('/c-2-b/confirm-url', [C2BController::class, 'confirm'])->name('c2b.confirm');
Route::post('/c-2-b/validate-url', [C2BController::class, 'validation'])->name('c2b.validation');
