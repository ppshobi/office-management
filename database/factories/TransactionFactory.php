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

$factory->define(App\Transaction::class, function (Faker $faker) {

    $transactionTypes = \App\TransactionType::all()->pluck('id')->toArray();

    return [
        'amount' => $faker->numberBetween(500, 1000),
        'student_id' => factory('App\Student')->create()->id,
        'transaction_type_id' => $faker->randomElement($transactionTypes),
        'date' => $faker->date(),
    ];
});


