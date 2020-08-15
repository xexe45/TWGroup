<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Publication;
use App\User;
use Faker\Generator as Faker;

$factory->define(Publication::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(8),
        'content' => $faker->paragraph(),
        'user_id' => User::all()->random()->id,
    ];
});
