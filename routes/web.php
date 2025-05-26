<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return redirect('/login');
});


Route::middleware(['auth'])->group(function () {
Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
Route::resource('/products', ProductController::class);
Route::resource('/categories', CategoryController::class);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/shop', [ProductController::class, 'shop'])->name('shop');
 Route::get('/checkout', fn() => view('checkout'))->name('checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');
    Route::get('/my-orders', [OrderController::class, 'indexForCustomer'])->name('orders.customer');

 Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
 Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
 Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';
