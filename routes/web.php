<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Session;
use App\Models\cart;
use App\Models\User;

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

//Entry Route
Route::view('register', 'Entry.registraion');
Route::post('registration', [UserController::class, 'registration']);
Route::get('/login', function () {
    return view('Entry.logIn');
})->name('login');
Route::post('/login', [UserController::class, 'logIn']);

//Exit Route
Route::get('/logout', [UserController::class, 'logOut']);


//Home Route
Route::get('/', [HomeController::class, 'index']);

//Product Controller
Route::get('details/{id}', [ProductController::class, 'details']);

//Cart Route
Route::post('/addtocart', [CartController::class, 'addToCart']);
Route::get('cartlist', [CartController::class, 'cartList']);
Route::get('/removecart/{id}', [CartController::class, 'removeCart']);

//Order Route
Route::get('ordernow', [ProductController::class, 'orderNow']);
Route::post('placedorder', [ProductController::class, 'placedOrder']);
Route::get('myorders', [ProductController::class, 'myOrders']);

