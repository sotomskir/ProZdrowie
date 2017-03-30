<?php

use Illuminate\Database\Seeder;

class DictsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dicts')->insert([
            'id' => 1,
            'type' => 1,
            'name' => 'PAL',
            'description' => '',
        ]);
        DB::table('dicts')->insert([
            'type' => 1,
            'name' => 'SEX',
            'description' => '',
        ]);
        DB::table('dicts')->insert([
            'type' => 2,
            'name' => 'BMI',
            'description' => '',
        ]);
    }
}
