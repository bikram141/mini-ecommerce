<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\PaypalController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('load-cart-data',[CartController::class.'cartCount']);
Route::get('/',[FrontendController::class,'index']);
Route::get('view-product/{id}',[FrontendController::class,'view']);
Route::post('add-to-cart',[CartController::class,'addProduct']);
Route::post('delete-cart-item',[CartController::class,'removeProduct']);

Route::middleware(['auth'])->group(function(){
    Route::get('cart',[CartController::class,'viewCart']);
    Route::get('checkout',[CheckoutController::class,'index']);
    Route::post('place-order',[CheckoutController::class,'placeorder']);
    Route::post('/paypal', [PaypalController::class, 'payWithpaypal']);
    Route::get('/status', [PaypalController::class, 'getPaymentStatus']);

});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('dashboard',[DashboardController::class,'index']);
    //product
    Route::get('product-list',[ProductController::class,'index']);
    Route::get('add-product',[ProductController::class,'add']);
    Route::post('create-product',[ProductController::class,'create']);
    Route::get('edit-product/{id}',[ProductController::class,'edit']);
    Route::put('update-product/{id}',[ProductController::class,'update']);
    Route::delete('delete-product/{id}',[ProductController::class,'delete']);
    

});