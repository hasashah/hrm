<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Cellnumber;
use Faker\Generator as Faker;

$factory->define(Cellnumber::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'cellnumber' => $faker->phoneNumber,
    ];
});
