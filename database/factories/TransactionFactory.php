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
        'remark' => $faker->sentence(6),
        'transaction_type_id' => $faker->randomElement($transactionTypes),
        'transactionable_type' => \App\Student::class,
        'transactionable_id' => factory('App\Student')->create()->id,
        'date' => $faker->date(),
    ];
});


