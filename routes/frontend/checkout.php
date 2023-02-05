<?php

use App\Http\Controllers\Frontend\Checkout\CheckoutController;
use Illuminate\Support\Facades\Route;

Route::prefix('user/checkout/{type}/')
    ->name('frontend.checkout.')
    ->controller(CheckoutController::class)
    ->group(function () {
        Route::match(['get', 'post'], '/list', 'index')->name('list');
    });
