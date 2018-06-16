<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'user_id' => function() {
            return User::all()->random();
        },
    ];
});
