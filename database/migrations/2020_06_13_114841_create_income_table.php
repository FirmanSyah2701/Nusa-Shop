<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('income', function (Blueprint $table) {
            $table->increments('income_id');
            $table->integer('payment_id')->unsigned();
            $table->foreign('payment_id')->references('payment_id')->on('payment');
            $table->integer('capital_id')->unsigned();
            $table->foreign('capital_id')->references('capital_id')->on('capital');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('income');
    }
}
