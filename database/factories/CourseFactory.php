<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Course;
use Faker\Generator as Faker;

$factory->define(App\Course::class, function (Faker $faker) {
    return [
        'course_name' =>   $faker->sentence($nbWords = 3, $variableNbWords = true),
        'course_level' =>  $faker->randomElement(['easy', 'medium','hard']),
        'course_description' =>  $faker->paragraph,
        'course_image' =>  $faker->randomElement(['1606058374.png', '1606060917.png'])
    ];
});
