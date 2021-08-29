<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashoardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::get('/', [AppController::class, 'index']);
Route::get('/dashboard', [DashoardController::class, 'index']);
Route::get('/orders', [DashoardController::class, 'orders'])->middleware('auth')->name('orders');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class, 'doLogin'])->name('user.login');
Route::post('/signup', [AuthController::class, 'doSignup'])->name('user.signup');
Route::get('/signout', [AuthController::class, 'signout'])->name('signout');

Route::get('/products', [ProductController::class, 'index'])->name('products')->middleware('auth');
Route::get('/product/add', [ProductController::class , 'create'])->name('product.create')->middleware('auth');
Route::get('/product/edit/{id}', [ProductController::class , 'update'])->name('product.edit')->middleware('auth');
Route::get('/product/{id}', [ProductController::class , 'viewProduct']);
Route::post('/product/submit/{id?}', [ProductController::class , 'saveProduct'])->name('product.submit')->middleware('auth');
Route::get('/product/delete/{id}', [ProductController::class , 'deleteProduct'])->name('product.delete')->middleware('auth');

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart/add/{id}/{remove?}', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/submit', [CartController::class ,'placeOrder'])->name('cart.order');
