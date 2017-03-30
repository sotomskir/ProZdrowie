<?php

use App\Models\Measurement;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function (User $user) {
            $user->measurements()->saveMany(factory(Measurement::class, 5)->make());
        });
    }
}
