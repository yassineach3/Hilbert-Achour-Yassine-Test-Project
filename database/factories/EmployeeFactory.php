<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'designation' => $faker->name,
        'address' => $faker->address,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->phoneNumber,
        'company' => function() {
            return factory(\App\Company::class)->create()->id;
        },
    ];
});
