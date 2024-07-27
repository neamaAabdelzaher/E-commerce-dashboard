<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\productsController;
use App\Http\Controllers\api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::middleware('jwt.verify')->group(function () {
  // api route for products
Route::get('products',[productsController::class,'index']);
Route::get('product/{id}',[productsController::class,'show']);
Route::get('products/create',[productsController::class,'create']);
Route::post('products/store',[productsController::class,'store']);
Route::post('product/update/{id}',[productsController::class,'update']);
Route::post('product/delete/{id}',[productsController::class,'destroy']); 
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});

