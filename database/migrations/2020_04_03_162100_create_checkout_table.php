<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkout', function (Blueprint $table) {
            $table->increments('checkout_id');
            $table->string('product_code')->index();
            $table->foreign('product_code')->references('product_code')->on('products');
            $table->integer('courier_id')->unsigned();
            $table->foreign('courier_id')->references('courier_id')->on('couriers');
            $table->integer('address_id')->unsigned();
            $table->foreign('address_id')->references('address_id')->on('address');
            $table->double('price_courier');
            $table->double('total_price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkout');
    }
}
