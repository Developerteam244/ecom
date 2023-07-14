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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('password',400);
            $table->string('name')->nullable();
            $table->string('mobile')->nullable()->unique();
            $table->string('area')->nullable();
            $table->string('city')->nullable();
            $table->string('dist')->nullable();
            $table->string('state')->nullable();
            $table->string('pin')->nullable();
            $table->integer('email_status')->default(0);
            $table->string('login_type')->nullable();
            $table->string('token')->nullable()->unique();
            $table->string('image')->nullable();
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
        Schema::dropIfExists('users');
    }
};
