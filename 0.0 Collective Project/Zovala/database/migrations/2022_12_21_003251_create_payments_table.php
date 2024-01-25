<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedFloat('amount');
            $table->string('method',50);
            $table->datetime('update');
            $table->unsignedInteger('order_id');
            $table->timestamps();

            //foreign keys
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->foreign('order_id')->references('id')->on('orders'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
