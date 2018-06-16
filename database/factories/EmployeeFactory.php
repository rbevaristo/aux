<?php

use Faker\Generator as Faker;
use App\User;
use App\Company;
$factory->define(App\Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'contact' => $faker->e164PhoneNumber,
        'company_id' => function() {
            return Company::all()->random();
        },
        'user_id' => function() {
            return User::all()->random();
        },
    ];
});
