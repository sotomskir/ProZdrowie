<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDictValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dict_values', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('dict_id')->unsigned();
            $table->float('key');
            $table->string('value');
            $table->timestamps();

            $table->foreign('dict_id')->references('id')->on('dicts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dict_values');
    }
}
