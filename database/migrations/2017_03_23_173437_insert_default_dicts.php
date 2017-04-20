<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InsertDefaultDicts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('dicts')->insert([
//            'id' => 1,
            'type' => 1,
            'name' => 'PAL',
            'description' => '',
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 1,
            'key' => 1.2,
            'value' => 'Tryb siedzacy'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 1,
            'key' => 1.3,
            'value' => 'Dosc aktywny'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 1,
            'key' => 1.4,
            'value' => 'Umiarkowanie aktywny'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 1,
            'key' => 1.5,
            'value' => 'Aktywny'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 1,
            'key' => 1.6,
            'value' => 'Bardzo aktywny'
        ]);

        DB::table('dicts')->insert([
//            'id' => 2,
            'type' => 1,
            'name' => 'SEX',
            'description' => '',
        ]);

        DB::table('dict_values')->insert([
            'dict_id' => 2,
            'key' => 0,
            'value' => 'Kobieta'
        ]);

        DB::table('dict_values')->insert([
            'dict_id' => 2,
            'key' => 1,
            'value' => 'Mężczyzna'
        ]);

        DB::table('dicts')->insert([
//            'id' => 3,
            'type' => 2,
            'name' => 'BMI',
            'description' => '',
        ]);

        DB::table('dict_values')->insert([
            'dict_id' => 3,
            'key' => 18.5,
            'value' => 'Niedowaga'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 3,
            'key' => 25,
            'value' => 'Waga idealna'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 3,
            'key' => 30,
            'value' => 'Nadwaga'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 3,
            'key' => 40,
            'value' => 'Otyłość'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 3,
            'key' => 999,
            'value' => 'Duża otyłość'
        ]);

        DB::table('dicts')->insert([
//            'id' => 4,
            'type' => 1,
            'name' => 'OBESITY_TYPE',
            'description' => '',
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 4,
            'key' => 0,
            'value' => 'otyłość brzuszna'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 4,
            'key' => 1,
            'value' => 'otyłość typu pośladkowo-udowego'
        ]);
        DB::table('dict_values')->insert([
            'dict_id' => 4,
            'key' => 2,
            'value' => 'brak otyłości'
        ]);
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
