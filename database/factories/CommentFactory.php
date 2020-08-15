<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Comment;
use App\Models\Publication;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

    $status = $faker->randomElement([Comment::APROBADO, Comment::PENDIENTE, Comment::RECHAZADO]);
    $publication = Publication::all()->random();
    return [
        'publication_id' => $publication->id,
        'content' => $faker->paragraph(),
        'status' => $status,
        'publication_id' => Publication::all()->random()->id,
        'user_id' => User::all()->random()->id
    ];
});
