<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instructor;
use Faker\Generator as Faker;

$factory->define(App\Instructor::class, function (Faker $faker) {
    return [
        'instructor_name' => $faker->name($gender = 'male'|'female'), 
        'instructor_description' => $faker->text()         
    ];
});
