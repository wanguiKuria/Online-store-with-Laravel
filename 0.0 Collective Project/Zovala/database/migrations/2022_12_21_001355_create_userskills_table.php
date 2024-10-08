<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserskillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_skills', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');//the tailor
            $table->unsignedInteger('design_id');
            $table->timestamps();

            //foreign keys
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('design_id')->references('id')->on('designs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_skills');
    }
}
