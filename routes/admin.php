<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TexController;
use App\Http\Controllers\Admin\OrderController;
use App\Models\Order;
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

Route::controller(AdminController::class)->middleware(['admin_auth'])->group(function () {

    // dashboard
    Route::get('/dashboard', 'dashboard')->name('admin.dashboard');

    Route::controller(CategoryController::class)->group(function () {

        // category
        Route::get('category', 'index')->name('admin.all_category');

        // manage category
        Route::get('category/manage_category', 'manage_category')->name('admin.add_category');
        // edit category
        Route::get('category/edit/{id}', 'manage_category')->name('admin.edit_category');
        // delete category row
        Route::get('category/delete/{id}', 'delete')->name('admin.category_delete');
        Route::get('category/status/{status}/{id}', 'status')->name('admin.category_status');

        // insert category update
        Route::post('category/manage_category_process', 'manage_category_process')->name('admin.category_insert');
    });

    Route::controller(CouponController::class)->group(function () {
        // insert coupon
        Route::post('coupon/manage_coupon_process', 'manage_coupon_process')->name('coupon.insert');
        // coupon section
        Route::get('coupon', 'index');

        // manage coupon
        Route::get('coupon/manage_coupon', 'manage_coupon');
        // edit coupon
        Route::get('coupon/edit/{id}', 'manage_coupon');
        // delete coupon row
        Route::get('coupon/delete/{id}', 'delete');
        Route::get('coupon/status/{status}/{id}', 'status');
    });

    Route::controller(SizeController::class)->group(function () {
        // insert size
        Route::post('size/manage_size_process', 'manage_size_process')->name('admin.size_insert');

        // size section
        Route::get('size', 'index')->name('admin.all_size');

        // manage size
        Route::get('size/manage_size', 'manage_size')->name('admin.add_size');
        // edit size
        Route::get('size/edit/{id}', 'manage_size')->name('admin.edit_size');
        // delete size row
        Route::get('size/delete/{id}', 'delete')->name('admin.size_delete');
        Route::get('size/status/{status}/{id}', 'status')->name('admin.size_status');
    });

    Route::controller(ColorController::class)->group(function () {
        // insert color
        Route::post('color/manage_color_process', 'manage_color_process')->name('color.insert');

        // color section
        Route::get('color', 'index');

        // manage color
        Route::get('color/manage_color', 'manage_color');
        // edit color
        Route::get('color/edit/{id}', 'manage_color');
        // delete color row
        Route::get('color/delete/{id}', 'delete');
        Route::get('color/status/{status}/{id}', 'status');
    });

    Route::controller(TexController::class)->group(function () {
        // insert tex
        Route::post('tex/manage_tex_process', 'manage_tex_process')->name('admin.tax_insert');

        // tex section
        Route::get('tex', 'index')->name('admin.all_tax');

        // manage tex
        Route::get('tex/manage_tex', 'manage_tex')->name('admin.add_tax');
        // edit tex
        Route::get('tex/edit/{id}', 'manage_tex')->name('admin.tax_edit');
        // delete tex row
        Route::get('tex/delete/{id}', 'delete')->name('admin.tax_delete');
        Route::get('tex/status/{status}/{id}', 'status');
    });

    Route::controller(BrandController::class)->group(function () {
        // insert brand
        Route::post('admin/brand/manage_brand_process', 'manage_brand_process')->name('admin.brand_insert');

        // brand section
        Route::get('brand', 'index')->name('admin.all_brand');

        // manage brand
        Route::get('brand/manage_brand', 'manage_brand')->name('admin.add_brand');
        // edit brand
        Route::get('brand/edit/{id}', 'manage_brand')->name('admin.edit_brand');
        // delete brand row
        Route::get('brand/delete/{id}', 'delete')->name('admin.brand_delete');
        Route::get('brand/status/{status}/{id}', 'status')->name('admin.brand_status');

    });

    Route::controller(ProductController::class)->group(function () {
        // insert product
        Route::post('product/manage_product_process', 'manage_product_process')->name('admin.product_insert');

        // product section
        Route::get('product', 'index')->name('admin.all_product');

        // manage product
        Route::get('product/manage_product', 'manage_product')->name('admin.add_product');
        // edit product
        Route::get('product/edit/{id}', 'manage_product')->name('admin.product_edit');
        // delete product row
        Route::get('product/delete/{id}', 'delete')->name('admin.product_delete');
        // delete attribute
        Route::get('manage_product_process/delete/{paid}/{pid}', 'delete_pattr')->name('admin.product_attr_delete');
        // delte multiple image
        Route::post('manage_product_process/image/delete', 'delete_pimage')->name('admin.product_image_delete');
        // change product status
        Route::get('product/status/{status}/{id}', 'status')->name('admin.product_status');
    });



    // order contrller
        Route::controller(OrderController::class)->group(function () {
            // banner list
            Route::get('pending_orders', 'pending_orders')->name('admin.pending_orders');
            Route::get('pending_order/{order_id}', 'pending_order')->name('admin.pending_order');
            Route::get('accepted_orders', 'accepted_orders')->name('admin.accepted_orders');
            Route::get('accepted_order/{order_id}', 'accepted_order')->name('admin.accepted_order');
            Route::get('on_the_way_orders', 'on_the_way_orders')->name('admin.on_the_way_orders');
            Route::get('on_the_way_order/{order_id}', 'on_the_way_order')->name('admin.on_the_way_order');
            Route::get('delivered_orders', 'delivered_orders')->name('admin.delivered_orders');
            Route::get('delivered_order/{order_id}', 'delivered_order')->name('admin.delivered_order');
            Route::get('cancel_orders', 'cancel_orders')->name('admin.cancel_orders');
            Route::get('cancel_order/{order_id}', 'cancel_order')->name('admin.cancel_order');

            Route::get('order/status/{id}/{order_id}', 'order_status')->name('admin.order_status');
            Route::get('order/cancel/{id}/{order_id}', 'order_cancel')->name('admin.order_cancel');


        });
    // customer list

    Route::get('customer', [CustomerController::class, 'index']);
    Route::get('customer/show/{id}', [CustomerController::class, 'show']);

    Route::controller(BannerController::class)->group(function () {
        // banner list
        Route::get('banner', 'index')->name('admin.all_banner');

        // banner manage
        Route::get('banner/manage_banner', 'manage_banner')->name('admin.add_banner');
        Route::get('banner/edit/{id}', 'manage_banner')->name('admin.banner_edit');
        // change status
        Route::get('banner/status/{status}/{id}', 'status')->name('admin.banner_status');
        // delete banner
        Route::get('banner/delete/{id}', 'delete')->name('admin.banner_delete');
        // banner process
        Route::post('banner/manage_banner_process', 'manage_banner_process')->name('admin.banner_insert');
    });

    Route::get('uppassword', [AdminController::class, 'updatepassword']);
    Route::get('logout', function () {
        session()->forget('ADMIN_ID');
        session()->forget('ADMIN_LOGIN');
        session()->flash('error', 'Logout Successful');
        return redirect('admin');
    })->name('admin.logout');
});
