<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\PersonData::class, function (Faker\Generator $faker) {
//    static $password;
//    $firstName = $faker->firstName;
//    $lastName = $faker->lastName;
    return [
//        'username' => $firstName . $lastName,
//        'password' => $password ?: $password = bcrypt('secret'),
//        'first_name' => $firstName,
//        'last_name' => $lastName,
//        'age' => $faker->randomNumber(2),
        'sex' => $faker->randomElement([1, 0]),
        'pal' => $faker->randomElement([1.2, 1.3, 1.4, 1.5, 1.6]),
        'weight' => $faker->randomFloat(3, 50, 150),
        'height' => $faker->randomFloat(3, 1.20, 2.50),
    ];
});
