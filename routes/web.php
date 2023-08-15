<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Auth::routes();
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/kategori/{slug}', [HomeController::class, 'category'])->name('kategori');
Route::get('/detail/{slug}', [HomeController::class, 'detail'])->name('detail');


Route::get('/checkout/{slug}', [CheckoutController::class, 'index'])->name('index.checkout');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
Route::put('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('/checkout-now', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout/{id}', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/selesai/{id}', [CheckoutController::class, 'selesai'])->name('selesai');

Route::get('/pesanansaya', [HomeController::class, 'order'])->name('pesanan');
Route::put('/pesanansaya/status/{id}', [HomeController::class, 'order_update'])->name('pesanan.update');

Route::prefix('admin')->middleware('isAdmin')->group(function () {
    Route::get('/', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::resource('produk', ProductController::class);
    Route::resource('kategori', CategoryController::class);
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('admin.transaksi');
    Route::put('/transaksi/{id}', [TransactionController::class, 'update'])->name('admin.transaksi.update');

    Route::get('/laporan', [TransactionController::class, 'report'])->name('admin.report');
    Route::get('/laporan/filter', [TransactionController::class, 'report_filter'])->name('admin.report.filter');
    Route::resource('bank', BankController::class);
});
