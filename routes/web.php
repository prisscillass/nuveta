<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
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

Route::middleware('auth')->group(function () {
    //  Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/{product}', [CartController::class, 'store'])->name('cart.store');
    Route::delete('/cart/{cartItem}/delete', [CartController::class, 'destroy'])->name('cart.destroy');

    // transaction
    Route::get('/my-order', [TransactionController::class, 'index'])->name('transaction.index');
    Route::post('/checkout', [TransactionController::class, 'checkout'])->name('transaction.checkout');
    Route::post('/checkout/expedition', [TransactionController::class, 'checkoutExpedition'])->name('transaction.expedition');
    Route::post('/checkout/payment', [TransactionController::class, 'checkoutPayment'])->name('transaction.payment');
    // Route::

    // profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});

