<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/product/{slug}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/product/{slug}/order', [OrderController::class, 'create'])
    ->name('orders.create');

Route::post('/product/{slug}/order', [OrderController::class, 'store'])
    ->name('orders.store');

Route::get('/order/success/{orderNumber}', [OrderController::class, 'success'])
    ->name('orders.success');
