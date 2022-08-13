<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/index-cart', [App\Http\Controllers\CartController::class, 'index'])->name('index');

Route::get('/index-shop', [App\Http\Controllers\Shop::class, 'index'])->name('index')->middleware('auth');

Route::get('/show/{id}', [App\Http\Controllers\Shop::class, 'showDetail'])->name('showDetail');

Route::get('/', [App\Http\Controllers\LandingPage::class, 'index'])->name('index');

Route::get('/category/{id}', [App\Http\Controllers\Shop::class, 'category'])->name('category');

Route::post('/store', [App\Http\Controllers\CartController::class, 'store'])->name('store'); //untuk post atau masukan dari product ke cart

Route::patch('/cart/{id}', [\App\Http\Controllers\CartController::class, 'update'])->name('update');
//update quantity pada cart

Route::post('/checkout', [\App\Http\Controllers\CheckoutController::class, 'store'])->name('store');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
