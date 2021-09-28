<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

Route::get('/login', function () {
    
    return view('logIn');
});
Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
    
});
Route::view('register', 'registraion');
Route::post('registration', [UserController::class, 'registration']);
Route::post('/login', [UserController::class, 'logIn']);
Route::get('/', [ProductController::class, 'index']);
Route::get('details/{id}', [ProductController::class, 'details']);
Route::post('add_to_cart', [ProductController::class, 'addToCart']);
Route::get('cartlist', [ProductController::class, 'cartList']);
Route::get('/removecart/{id}', [ProductController::class, 'removeCart']);
Route::get('ordernow', [ProductController::class, 'orderNow']);
Route::post('placedorder', [ProductController::class, 'placedOrder']);
Route::get('myorders', [ProductController::class, 'myOrders']);

