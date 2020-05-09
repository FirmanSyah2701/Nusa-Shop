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
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('city_id')->on('city');
            //$table->double('price_courier');
            $table->string('courier');
            $table->string('customer_name');
            $table->string('full_address');
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
