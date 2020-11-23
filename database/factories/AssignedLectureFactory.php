<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'instructor_id' =>  $faker->numberBetween($min = 1, $max = 10),
        'course_id' =>  $faker->numberBetween($min = 1, $max = 10),
        'lecture_id' =>  $faker->numberBetween($min = 1, $max = 100),
        'assigned_for_date' =>  $faker->date($format = 'Y-m-d', $min = 'now'),
    ];
});
