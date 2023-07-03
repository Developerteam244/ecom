<?php


use App\Http\Controllers\Front\UserController;


use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(UserController::class)->group(function(){

    Route::get('/login','login');
});
