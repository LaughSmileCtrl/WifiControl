<?php

use App\Http\Controllers\FoodApiController;
use App\Http\Resources\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/menus/{type}', [FoodApiController::class, 'getMenu']);

Route::post('menu', [FoodApiController::class, 'storeMenu']);

Route::get('food-detail/{id}', [FoodApiController::class, 'foodDetail']);
