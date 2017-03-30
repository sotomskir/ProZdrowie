<?php

use App\Person;
use App\User;
use Illuminate\Database\Seeder;

class PersonDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 5)->create()->each(function (User $user) {
            $user->personData()->saveMany(factory(\App\PersonData::class, 5)->make());
        });
    }
}
