<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Dashboard\BrandController;
use App\Http\Controllers\Dashboard\ProductController;
use App\Http\Controllers\Dashboard\Sub_CategoryController;
use App\Http\Controllers\Dashboard\UserController;

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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'dashboard','middleware'=>[/*'auth.admin','auth',*//*'verified'*/]],function(){

    Route::get('/',DashboardController::class)->name('dashboard');
    Route::group(['prefix'=>'products','as'=>'products.'],function(){
    Route::get('/',[ProductController::class,'index'])->name('index');
   Route::get('/create',[ProductController::class,'create'])->name('create');
   Route::post('/store',[ProductController::class,'store'])->name('store');
   Route::get('/edit/{product_id}',[ProductController::class,'edit'])->name('edit');
   Route::put('/update/{product_id}',[ProductController::class,'update'])->name('update');
   Route::delete('/destroy/{product_id}',[ProductController::class,'destroy'])->name('destroy');
   Route::patch('/status/toggle/{product_id}',[ProductController::class,'statusToggle'])->name('toggle');
   
    });

    Route::group(['prefix'=>'sub_categories','as'=>'sub_categories.'],function(){

        Route::get('/',[Sub_CategoryController::class,'index'])->name('index');
        Route::get('create',[Sub_CategoryController::class,'create'])->name('create');
        Route::post('store',[Sub_CategoryController::class,'store'])->name('store');
        Route::get('edit/{brand_id}',[Sub_CategoryController::class,'edit'])->name('edit');
        Route::put('update/{brand_id}',[Sub_CategoryController::class,'update'])->name('update');
        
    });
    Route::group(['prefix'=>'brands','as'=>'brands.'],function(){

        Route::get('/',[BrandController::class,'index'])->name('index');
        Route::get('create',[BrandController::class,'create'])->name('create');
        Route::post('store',[BrandController::class,'store'])->name('store');
        Route::get('edit/{brand_id}',[BrandController::class,'edit'])->name('edit');
        Route::put('update/{brand_id}',[BrandController::class,'update'])->name('update');
        
    });

    Route::group(['prefix'=>'users','as'=>'users.'],function(){

        Route::get('/',[UserController::class,'index'])->name('index');
        Route::delete('/destroy/{user_id}',[UserController::class,'destroy'])->name('destroy');
   Route::patch('/type/toggle/{user_id}',[UserController::class,'typeToggle'])->name('toggle');


        
    });
   
   }); 
// Route::prefix('dashboard')->group(function(){
//     Auth::routes(['verify'=>true,'register'=>false]);
//     });

Auth::routes(['verify'=>true]);

Route::middleware('auth')->group(function(){
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

