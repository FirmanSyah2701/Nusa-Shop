<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_detail', function (Blueprint $table) {
            $table->increments('cart_detail_id');
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('cart_id')->on('cart');
            $table->string('product_code', 15)->index();
            $table->foreign('product_code')->references('product_code')->on('products');
            $table->integer('qty');
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_detail');
    }
}
