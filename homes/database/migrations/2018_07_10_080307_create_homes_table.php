<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->text('description');
            $table->integer('price');
            $table->integer('size');
            $table->string('country');
            $table->string('city');
            $table->timestamps();
        });
        ###### table for favorites #############
        Schema::create('home_user', function (Blueprint $table) {
            $table->integer('home_id');
            $table->integer('user_id');
            $table->primary(['home_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homes');
    }
}


// Schema::create('homes', function (Blueprint $table) {
//     $table->increments('id');
//     $table->integer('user_id');
//     $table->string('title');
//     $table->text('description');
//     $table->integer('price');
//     $table->timestamps();
// });