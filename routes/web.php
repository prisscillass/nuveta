<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// Product
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');

//  Cart
Route::middleware('auth')->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cartItem}/delete', [CartController::class, 'destroy'])->name('cart.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/checkout/shipping', [CheckoutController::class, 'showShipping'])->name('checkout.shipping.show');
    Route::post('/checkout/shipping', [CheckoutController::class, 'storeShipping'])->name('checkout.shipping.store');
    Route::post('/checkout/payment/process', [CheckoutController::class, 'payment'])->name('checkout.payment.process');
    Route::get('/checkout/payment', [CheckoutController::class, 'showPayment'])->name('checkout.payment');
});
Route::middleware('auth')->get('/myorder', [OrderController::class, 'index'])->name('order.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});
