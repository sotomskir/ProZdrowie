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
use App\Models\Measurement;
use App\Models\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    static $password;

    $firstName = $faker->firstName;
    $lastName = $faker->lastName;
    return [
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $firstName.$lastName.'@psat.pl',
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'sex' => $faker->randomElement([1, 0])
    ];
});

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Measurement::class, function (Faker\Generator $faker) {
    return [
//        'age' => $faker->randomNumber(2),
        'pal' => $faker->randomElement([1.2, 1.3, 1.4, 1.5, 1.6]),
        'weight' => $faker->randomFloat(3, 50, 150),
        'height' => $faker->randomFloat(3, 1.20, 2.50),
    ];
});
