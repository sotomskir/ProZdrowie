<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PersonDataSeeder::class);
//         $this->call(DictsSeeder::class);
//         $this->call(DictsValuesSeeder::class);
    }
}
