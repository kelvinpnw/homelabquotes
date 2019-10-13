<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserFavourites extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fav_user_intersection', function (Blueprint $table) {
            $table->increments('int_id');
            $table->timestamps();
            $table->unsignedInteger('fk_user_id');
            $table->unsignedInteger('fk_quote_id');
            $table->foreign('fk_user_id')->references('id')->on('users');
            $table->foreign('fk_quote_id')->references('id')->on('quotes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
