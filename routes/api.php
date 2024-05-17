<?php

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
