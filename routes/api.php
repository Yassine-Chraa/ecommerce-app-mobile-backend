<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\CategorieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('products', ProductController::class);
Route::get('latestProduct',[ProductController::class,'getRecentAdded']);
Route::get('productsNbr',[ProductController::class,'getProductsNbr']);
Route::get('paginate',[ProductController::class,'paginate']);
Route::apiResource('categories', CategorieController::class);
Route::apiResource('users', UserController::class);
Route::post('login',[UserController::class,'login']);
