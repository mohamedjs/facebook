<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFreind extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_freind', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('send_id')->unsigned();
            $table->foreign("send_id")->references('id')->on('users') ;
            $table->integer('recive_id')->unsigned();
            $table->foreign("recive_id")->references('id')->on('users') ;
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
        Schema::dropIfExists('final');
    }
}
