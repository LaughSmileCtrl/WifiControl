<?php

use App\Http\Controllers\OrderController;
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

Route::get('/', [OrderController::class, 'home']);

Route::post('store-name', [OrderController::class, 'storeName']);

Route::get('logout', [OrderController::class, 'deleteSession']);

Route::get('food-order', [OrderController::class, 'foodOrder']);

Route::post('food-order', [OrderController::class, 'storeFood']);
