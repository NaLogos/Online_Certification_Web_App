<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exam;
use Faker\Generator as Faker;

$factory->define(Exam::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
        'description' => $faker->text(20),
    ];
});
