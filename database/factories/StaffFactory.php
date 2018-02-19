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

$factory->define(App\Staff::class, function (Faker $faker) {

    return [
        'name'           => $faker->name,
        'dob'            => $faker->date(),
        'address'        => $faker->address,
        'phone_number'   => $faker->e164PhoneNumber(),
        'salary'         => $faker->randomElement([10000, 25000, 15000, 8000,]),
        'designation'    => $faker->randomElement(['Teacher', 'Teacher', 'Teacher', 'Teacher', 'Principal', 'Helper'])
    ];
});