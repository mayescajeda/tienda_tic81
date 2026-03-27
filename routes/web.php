<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController; // <-- Asegúrate de que esta línea esté aquí
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class , 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class , 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class , 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class , 'destroy'])->name('profile.destroy');
});

// RUTAS DEL CARRITO
Route::get('/cart', [CartController::class , 'index'])->name('cart.index');
Route::get('/add-to-cart/{id}', [CartController::class , 'add'])->name('cart.add');
Route::post('/update-cart', [CartController::class , 'update'])->name('cart.update');
Route::post('/remove-from-cart', [CartController::class , 'remove'])->name('cart.remove');

// RUTAS DE CHECKOUT Y ÓRDENES
Route::middleware('auth')->group(function () {
    // Esta muestra el formulario
    Route::get('/checkout', [CartController::class , 'checkout'])->name('cart.checkout');

    // Esta procesa el pago (Es la que te daba el error)
    Route::post('/checkout/process', [CheckoutController::class , 'store'])->name('checkout.process');

    // Esta muestra el éxito de la compra
    Route::get('/order/success/{id}', [CheckoutController::class , 'success'])->name('orders.success');
});

require __DIR__ . '/auth.php';