<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lecture;
use Faker\Generator as Faker;

$factory->define(App\Lecture::class, function (Faker $faker) {
    return [
        'lecture_name' =>   $faker->sentence($nbWords = 3, $variableNbWords = true),
        'lecture_duration' =>  $faker->numberBetween($min = 1, $max = 120),
        'lecture_content' =>  $faker->paragraph,
        'course_id' => $faker->numberBetween($min = 1, $max = 10)

    ];
});
