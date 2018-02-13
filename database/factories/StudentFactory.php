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

$factory->define(App\Student::class, function (Faker $faker) {

    return [
        'name'           => $faker->name,
        'dob'            => $faker->date(),
        'address'        => $faker->address,
        'phone_number'   => $faker->e164PhoneNumber(),
        'guardians_name' => $faker->name,
        'course_id'      => factory('App\Course')->create()->id,
    ];
});