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

$factory->define(App\Course::class, function (Faker $faker) {

    return [
        'name' => $faker->text(50),
        'duration'=> $faker->randomElement([3,6,12]),
        'price' => $faker->randomElement([10000, 2000, 5000, 1000, 2500]),
        'is_recurring' => $faker->boolean,
    ];
});