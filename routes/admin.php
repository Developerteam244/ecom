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

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
    Route::get('/', [AdminController::class, 'index']);
    Route::post('/admin.auth', [AdminController::class, 'auth'])->name('admin.auth');

    Route::controller(AdminController::class)->middleware(['admin_auth'])->group(function(){

    // dashboard
    Route::get('/dashboard',  'dashboard');


    Route::controller(CategoryController::class)->group(function () {


                    // category
                    Route::get('category',  'index');

                    // manage category
                    Route::get('category/manage_category',  'manage_category');
                    // edit category
                    Route::get('category/edit/{id}', 'manage_category');
                    // delete category row
                    Route::get('category/delete/{id}',  'delete');
                    Route::get('category/status/{status}/{id}',  'status');


                    // insert category
                    Route::post('category/manage_category_process',  'manage_category_process')->name('category.insert');
    });

    Route::controller(CouponController::class)->group(function () {
        // insert coupon
        Route::post('coupon/manage_coupon_process',  'manage_coupon_process')->name('coupon.insert');
        // coupon section
        Route::get('coupon',  'index');

        // manage coupon
        Route::get('coupon/manage_coupon',  'manage_coupon');
        // edit coupon
        Route::get('coupon/edit/{id}',  'manage_coupon');
        // delete coupon row
        Route::get('coupon/delete/{id}',  'delete');
        Route::get('coupon/status/{status}/{id}',  'status');
    });

    Route::controller(SizeController::class)->group(function () {
        // insert size
        Route::post('size/manage_size_process', 'manage_size_process')->name('size.insert');


         // size section
        Route::get('size', 'index');

        // manage size
        Route::get('size/manage_size', 'manage_size');
        // edit size
        Route::get('size/edit/{id}', 'manage_size');
        // delete size row
        Route::get('size/delete/{id}', 'delete');
        Route::get('size/status/{status}/{id}', 'status');
    });

    Route::controller(SizeController::class)->group(function () {
        // insert color
        Route::post('color/manage_color_process',  'manage_color_process')->name('color.insert');


         // color section
        Route::get('color',  'index');

        // manage color
        Route::get('color/manage_color',  'manage_color');
        // edit color
        Route::get('color/edit/{id}',  'manage_color');
        // delete color row
        Route::get('color/delete/{id}',  'delete');
        Route::get('color/status/{status}/{id}',  'status');
    });


    Route::controller(TexController::class)->group(function () {
       // insert tex
        Route::post('tex/manage_tex_process',  'manage_tex_process')->name('tex.insert');


        // tex section
        Route::get('tex',  'index');

        // manage tex
        Route::get('tex/manage_tex',  'manage_tex');
        // edit tex
        Route::get('tex/edit/{id}',  'manage_tex');
        // delete tex row
        Route::get('tex/delete/{id}',  'delete');
        Route::get('tex/status/{status}/{id}',  'status');
    });


    Route::controller(BrandController::class)->group(function () {
        // insert brand
        Route::post('admin/brand/manage_brand_process',  'manage_brand_process')->name('brand.insert');


         // color section
        Route::get('brand',  'index');

        // manage color
        Route::get('brand/manage_brand',  'manage_brand');
        // edit color
        Route::get('brand/edit/{id}',  'manage_brand');
        // delete color row
        Route::get('brand/delete/{id}',  'delete');
        Route::get('brand/status/{status}/{id}',  'status');

    });

    Route::controller(ProductController::class)->group(function () {
            // insert product
            Route::post('product/manage_product_process',  'manage_product_process')->name('product.insert');


            // product section
            Route::get('product',  'index');

            // manage product
            Route::get('product/manage_product',  'manage_product');
            // edit product
            Route::get('product/edit/{id}',  'manage_product');
               // delete product row
            Route::get('product/delete/{id}',  'delete');
            // delete attribute
            Route::get('manage_product_process/delete/{paid}/{pid}',  'delete_pattr');
            // delte multiple image
            Route::get('manage_product_process/image/delete/{piid}/{pid}',  'delete_pimage');
            // change product status
            Route::get('product/status/{status}/{id}',  'status');
    });


            // customer list

            Route::get('customer',[CustomerController::class, 'index']);
            Route::get('customer/show/{id}',[CustomerController::class, 'show']);

    Route::controller(BannerController::class)->group(function () {
            // banner list
            Route::get('banner', 'index');

            // banner manage
            Route::get('banner/manage_banner', 'manage_banner');
            Route::get('banner/edit/{id}', 'manage_banner');
            // change status
            Route::get('banner/status/{status}/{id}', 'status');
            // delete banner
            Route::get('banner/delete/{id}', 'delete');
            // banner process
            Route::post('banner/manage_banner_process', 'manage_banner_process')->name('banner.insert');
    });

        Route::get('uppassword', [AdminController::class, 'updatepassword']);
        Route::get('logout', function () {
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_LOGIN');
        session()->flash('error','Logout Successful');
        return redirect('admin');
         });
});
