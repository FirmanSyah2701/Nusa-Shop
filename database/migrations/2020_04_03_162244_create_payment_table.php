<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment', function (Blueprint $table) {
            $table->increments('payment_id', 4);
            $table->integer('checkout_id')->unsigned();
            $table->foreign('checkout_id')->references('checkout_id')->on('checkout');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->integer('validation_id')->unsigned();
            $table->foreign('validation_id')->references('validation_id')->on('validations');
            $table->string('photo', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment');
    }
}
