<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\OrderController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AppController::class, 'index'])->name('index');

Route::resource('/items', ItemController::class);

Route::get('/order', [OrderController::class, 'order'])->name('order');
Route::get('/order/list', [OrderController::class, 'orderList'])->name('orderList');
Route::get('/order/list/{order}', [OrderController::class, 'orderDetail'])->name('orderDetail');
Route::post('/order', [OrderController::class, 'createOrder'])->name('createOrder');
