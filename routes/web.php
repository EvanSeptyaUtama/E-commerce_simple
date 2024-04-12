<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Redirect::route('index_product');
});

Auth::routes();

Route::get('/product', [ProductController::class, 'index_product'])->name('index_product');
Route::middleware(['admin'])->group(function () {

    Route::get('/create_produk', [ProductController::class, 'create'])->name('create');
    Route::post('/store_produk', [ProductController::class, 'store'])->name('store');
    Route::get('/update_produk/{product}', [ProductController::class, 'update'])->name('update_product');
    Route::patch('/update_process/{product}', [ProductController::class, 'update_process'])->name('update_produk');
    Route::delete('/hapus_produk/{product}', [ProductController::class, 'delete'])->name('hapus');

    Route::post('/order/{order}/confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/show_produk/{product}', [ProductController::class, 'show'])->name('show');
    Route::post('/tambah_cart/{product}', [CartController::class, 'tambah_keranjang'])->name('tambah_keranjang');
    Route::get('/cart', [CartController::class, 'show_cart'])->name('show_keranjang');
    Route::patch('/keranjang_edit/{cart}', [CartController::class, 'update_process'])->name('update_process');
    Route::delete('/delete_cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');

    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/order', [OrderController::class, 'index_order'])->name('index_order');
    Route::get('/order_show/{order}', [OrderController::class, 'show_order'])->name('show_order');
    Route::post('/submit_pr/{order}', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');

    Route::get('/profile', [ProfileController::class, 'show_profile'])->name('show_profile');
    Route::post('/profile', [ProfileController::class, 'edit_profile'])->name('edit_profile');
});
