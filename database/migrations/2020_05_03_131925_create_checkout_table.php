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
            $table->integer('cart_id')->unsigned();
            $table->foreign('cart_id')->references('cart_id')->on('cart');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('city_id')->on('city');
            $table->string('courier');
            $table->string('service');
            $table->string('etd');
            $table->string('customer_name');
            $table->string('full_address');
            $table->string('number_phone');
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
