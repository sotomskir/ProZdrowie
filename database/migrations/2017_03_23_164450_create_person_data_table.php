<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_data', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('user_id');
//              $table->string('username');
//              $table->string('password');
//              $table->string('first_name');
//              $table->string('last_name');
//              $table->integer('age');
              $table->integer('sex');
              $table->float('pal');
              $table->float('weight');
              $table->float('height');
              $table->timestamps();

              $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_data');
    }
}
