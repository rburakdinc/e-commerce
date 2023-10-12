<?php

use App\Http\Controllers\Frontend\CheckoutController;
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

Route::get('/',[\App\Http\Controllers\Frontend\HomeController::class,'index'])->name('home.index');
Route::get('/category/{category:slug}',[\App\Http\Controllers\Frontend\CategoryController::class,'index']);

Route::get('/sign-in',[\App\Http\Controllers\Frontend\AuthController::class,'signInForm']);
Route::post('/sign-in',[\App\Http\Controllers\Frontend\AuthController::class,'signIn']);

Route::get('/sign-up',[\App\Http\Controllers\Frontend\AuthController::class,'signUpForm']);
Route::post('/sign-up',[\App\Http\Controllers\Frontend\AuthController::class,'signUp']);
Route::get('/sign-out',[\App\Http\Controllers\Frontend\AuthController::class,'signOut']);

Route::group(["middleware" => "auth"], function (){
    Route::get('/my-cart',[\App\Http\Controllers\Frontend\CartController::class,'index']);
    Route::get('/my-cart/add/{product}',[\App\Http\Controllers\Frontend\CartController::class,'add']);
    Route::get('/my-cart/delete/{cartDetails}',[\App\Http\Controllers\Frontend\CartController::class,'remove']);
    Route::get("/buy", [CheckoutController::class, 'showCheckoutForm']);
    Route::post("/buy", [CheckoutController::class, 'checkout']);
});


Route::group(["middleware" => "auth"], function (){
    Route::resource('/dashboard',\App\Http\Controllers\Backend\UserController::class);
    Route::resource('/dashboard/{user}/addresses',\App\Http\Controllers\Backend\AddressController::class);
    Route::resource('/categories',\App\Http\Controllers\Backend\CategoryController::class);
    Route::resource('/products',\App\Http\Controllers\Backend\ProductController::class);
    Route::resource('/products/{product}/images',\App\Http\Controllers\Backend\ProductImageController::class);
});

