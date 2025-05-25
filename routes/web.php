<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
Route::get('/', function () {
    return redirect('/login');
});



Route::get('/dashboard', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::resource('/products', ProductController::class);
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/shop', [\App\Http\Controllers\ProductController::class, 'shop'])->middleware(['auth'])->name('shop');
Route::post('/checkout', [\App\Http\Controllers\OrderController::class, 'store'])->name('checkout.store');
Route::post('/checkout', [\App\Http\Controllers\OrderController::class, 'store'])->name('orders.store');

});

require __DIR__.'/auth.php';
