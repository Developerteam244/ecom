<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');

            $table->string('name');
            $table->string('mobile');
            $table->string('area_point')->nullable();
            $table->string('area');
            $table->string('lmark')->nullable();

            $table->string('city');
            $table->string('dist');
            $table->string('pin');
            $table->string('state');

            $table->integer('subtotal');
            $table->string('coupon_code')->nullable();
            $table->enum('coupon_type',['P','F'])->nullable();
            $table->string('coupon_value')->nullable();
            $table->string('total')->nullable();
            $table->integer('is_refund')->default(0);
            $table->integer('refund_id')->nullable();
            $table->string('pay_id')->nullable();
            $table->string('order_status');

            $table->string('status')->default('created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
