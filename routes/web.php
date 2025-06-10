<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
