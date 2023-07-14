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

    Route::post('signup','signup')->name('signup');
    Route::post('signin','signin')->name('signin');
    Route::get('login','login');
    Route::get('signup','singup_view')->name('signup_view');

    Route::middleware(['user_auth'])->group(function () {
        Route::get('dashboard','user_dashboard')->name('user.dashboard');
        Route::get('manage_profile','manage_profile');
        Route::post('manage_profile_process','manage_profile_process')->name('manage_profile_process');



        Route::get('logout',function (){
           session()->forget('USER_ID');
           session()->forget('USER_NAME');

        return redirect('/');
        });
    });
});
