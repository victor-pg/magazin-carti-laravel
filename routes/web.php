<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\ProductsController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\ProductsController::class, 'index'])->name('index');
Route::get('/cart',[App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::post('/add-to-cart',[App\Http\Controllers\CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('/details/{id}',[App\Http\Controllers\CartController::class, 'getDetails'])->name('details');
