<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CartMigrate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table){
          $table->increments('id');
          $table->integer('dishes_id')->unsigned();
          $table->integer('order_id')->nullable()->unsigned();
          $table->string('token');
          $table->timestamps();

          $table->foreign('dishes_id')->references('id')->on('dishes')->onDelete('cascade');
          $table->foreign('order_id')->references('id')->on('order')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
