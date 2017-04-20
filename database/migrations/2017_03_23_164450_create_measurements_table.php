<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeasurementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
              $table->increments('id');
              $table->integer('user_id');
              $table->float('weight');
              $table->float('height');
              $table->float('waist');
              $table->float('biceps');
              $table->float('hips');
              $table->float('thigh');
              $table->float('chest');
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
        Schema::dropIfExists('measurements');
    }
}
