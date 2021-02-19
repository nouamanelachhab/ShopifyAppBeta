<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;

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
    return view('welcome');
})->middleware(['auth.shopify'])->name('home');

/*Route::get('/orders', function () {
    return view('orders');
})->middleware(['auth.shopify'])->name('home');*/

Route::get("order",[OrdersController::class,'testRequest']);

Route::view("orders",'orders');