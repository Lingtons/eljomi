<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('secret'), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Type::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});

$factory->define(App\Models\Customer::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'code' => str_random(10),
        'email' => $faker->unique()->safeEmail,
        'nickname' => $faker->name,
        'phone' => $faker->numberBetween(4, 18),
        'address' => $faker->word,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'gender' => $faker->randomElement(['Female','Male']),
    ];
});

$factory->define(App\Models\Preference::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
