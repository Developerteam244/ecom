<?php


use App\Http\Controllers\Front\FrontController;
use App\Http\Controllers\Front\CartController;


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
Route::controller(FrontController::class)->group(function(){

    Route::get('/', 'index');
    Route::get('product/{slug}','product');

    Route::get('category/{category_slug}','category');
    Route::post('top_filter','top_filter');

});
Route::controller(CartController::class)->group(function(){


    Route::post('add_cart','add_to_cart');
    Route::post('delete_cart_item','delete_cart_item');
    Route::post('cart_quatity_update','cart_quatity_update');
    Route::get('checkout','checkout');
    Route::get('checkout_details/{type}','checkout_details');
    Route::post('checkout_details_submit','checkout_details_submit');
    Route::post('checkout_order','checkout_order');
    Route::post('checkout_payment','checkout_payment');
    Route::get('cart_checkout_process','cart_checkout_process');
    Route::get('checkout_callback','checkout_callback');


});


