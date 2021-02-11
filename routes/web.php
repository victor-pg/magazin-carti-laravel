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
Route::post('/delete-from-cart/{id}',[App\Http\Controllers\CartController::class, 'removeFromCart'])->name('removeFromCart');
Route::get('/admin',[App\Http\Controllers\DashboardController::class, 'index'])->name('admin');
Route::get('/admin/add',[App\Http\Controllers\DashboardController::class, 'adminAdd'])->name('adminAdd');
Route::post('/admin/delete',[App\Http\Controllers\DashboardController::class, 'adminDelete'])->name('adminDelete');
Route::post('/admin/save-product',[App\Http\Controllers\DashboardController::class, 'saveProduct'])->name('saveProduct');
Route::get('/admin/edit-product/{id}',[App\Http\Controllers\DashboardController::class, 'adminEdit'])->name('adminEdit');
Route::post('/admin/save-edited-product',[App\Http\Controllers\DashboardController::class, 'adminEditSave'])->name('adminEditSave');
Route::get('/details/{id}',[App\Http\Controllers\ProductsController::class, 'showDetails'])->name('showDetails');