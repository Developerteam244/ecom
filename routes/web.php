<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\TexController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Front\FrontController;


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
    Route::post('add_cart','add_to_cart');
    Route::post('delete_cart_item','delete_cart_item');
    Route::post('cart_quatity_update','cart_quatity_update');
    Route::get('category/{category_slug}','category');
    Route::post('top_filter','top_filter');
    Route::middleware(['user_auth'])->group(function () {
        Route::get('dashboard','user_dashboard');

        Route::get('logout',function (){
           session()->forget('USER_ID');
           session()->forget('USER_NAME');

        return redirect('/');
        });
    });
    Route::post('signup','signup')->name('signup');
    Route::post('signin','signin')->name('signin');
    Route::get('login','login');
    Route::get('signup','singup_view');
});

Route::get('admin', [AdminController::class, 'index']);
Route::post('admin.auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware'=> 'admin_auth'],function(){

    // dashboard
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);
    Route::get('admin/dashboard', [AdminController::class, 'dashboard']);

    // category
    Route::get('admin/category', [CategoryController::class, 'index']);

    // manage category
    Route::get('admin/category/manage_category', [CategoryController::class, 'manage_category']);
    // edit category
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'manage_category']);
    // delete category row
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);


    // insert category
    Route::post('admin/category/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.insert');
    // insert coupon
    Route::post('admin/coupon/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.insert');
        // coupon section
        Route::get('admin/coupon', [CouponController::class, 'index']);

        // manage coupon
        Route::get('admin/coupon/manage_coupon', [CouponController::class, 'manage_coupon']);
        // edit coupon
        Route::get('admin/coupon/edit/{id}', [CouponController::class, 'manage_coupon']);
        // delete coupon row
        Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
        Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);


        // insert size
        Route::post('admin/size/manage_size_process', [SizeController::class, 'manage_size_process'])->name('size.insert');


         // size section
        Route::get('admin/size', [SizeController::class, 'index']);

        // manage size
        Route::get('admin/size/manage_size', [SizeController::class, 'manage_size']);
        // edit size
        Route::get('admin/size/edit/{id}', [SizeController::class, 'manage_size']);
        // delete size row
        Route::get('admin/size/delete/{id}', [SizeController::class, 'delete']);
        Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'status']);


        // insert color
        Route::post('admin/color/manage_color_process', [ColorController::class, 'manage_color_process'])->name('color.insert');


         // color section
        Route::get('admin/color', [ColorController::class, 'index']);

        // manage color
        Route::get('admin/color/manage_color', [ColorController::class, 'manage_color']);
        // edit color
        Route::get('admin/color/edit/{id}', [ColorController::class, 'manage_color']);
        // delete color row
        Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);
        Route::get('admin/color/status/{status}/{id}', [ColorController::class, 'status']);

       // insert tex
Route::post('admin/tex/manage_tex_process', [TexController::class, 'manage_tex_process'])->name('tex.insert');


// tex section
Route::get('admin/tex', [TexController::class, 'index']);

// manage tex
Route::get('admin/tex/manage_tex', [TexController::class, 'manage_tex']);
// edit tex
Route::get('admin/tex/edit/{id}', [TexController::class, 'manage_tex']);
// delete tex row
Route::get('admin/tex/delete/{id}', [TexController::class, 'delete']);
Route::get('admin/tex/status/{status}/{id}', [TexController::class, 'status']);


        // insert brand
        Route::post('admin/brand/manage_brand_process', [BrandController::class, 'manage_brand_process'])->name('brand.insert');


         // color section
        Route::get('admin/brand', [BrandController::class, 'index']);

        // manage color
        Route::get('admin/brand/manage_brand', [BrandController::class, 'manage_brand']);
        // edit color
        Route::get('admin/brand/edit/{id}', [BrandController::class, 'manage_brand']);
        // delete color row
        Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);
        Route::get('admin/brand/status/{status}/{id}', [BrandController::class, 'status']);


    // insert product
Route::post('admin/product/manage_product_process', [ProductController::class, 'manage_product_process'])->name('product.insert');


// product section
Route::get('admin/product', [ProductController::class, 'index']);

// manage product
Route::get('admin/product/manage_product', [ProductController::class, 'manage_product']);
// edit product
Route::get('admin/product/edit/{id}', [ProductController::class, 'manage_product']);
// delete product row
Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
// delete attribute
Route::get('admin/manage_product_process/delete/{paid}/{pid}', [ProductController::class, 'delete_pattr']);
// delte multiple image
Route::get('admin/manage_product_process/image/delete/{piid}/{pid}', [ProductController::class, 'delete_pimage']);
 // change product status
Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);

// customer list

Route::get('admin/customer',[CustomerController::class, 'index']);
Route::get('admin/customer/show/{id}',[CustomerController::class, 'show']);
// banner list
Route::get('admin/banner',[BannerController::class, 'index']);

// banner manage
Route::get('admin/banner/manage_banner',[BannerController::class, 'manage_banner']);
Route::get('admin/banner/edit/{id}',[BannerController::class, 'manage_banner']);
// change status
Route::get('admin/banner/status/{status}/{id}',[BannerController::class, 'status']);
// delete banner
Route::get('admin/banner/delete/{id}',[BannerController::class, 'delete']);
// banner process
Route::post('admin/banner/manage_banner_process',[BannerController::class, 'manage_banner_process'])->name('banner.insert');



    Route::get('admin/uppassword', [AdminController::class, 'updatepassword']);
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_LOGIN');
        session()->flash('error','Logout Successful');
        return redirect('admin');
    });
}
);
