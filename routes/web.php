<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [LandingPageController::class, 'index'])->name('index');

//product
Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/product/detail/{id}', [ProductController::class, 'detail'])->name('products.details');

//auth
Route::get('/auth', [AuthController::class, 'index'])->name('auth');
Route::post('/auth/login', [AuthController::class, 'postLogin'])->name('auth.login');
Route::post('/auth/register', [AuthController::class, 'postRegister'])->name('auth.register');
Route::post('/auth/logout', [AuthController::class, 'postLogout'])->name('auth.logout');

//cart
Route::get('/cart', [CartController::class, 'index'])->name('cart')->middleware('auth');

