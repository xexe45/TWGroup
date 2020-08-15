<?php

use App\Models\Comment;
use App\Models\Publication;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Comment::flushEventListeners();

        factory(User::class, 20)->create();
        factory(Publication::class, 100)->create();
        factory(Comment::class, 500)->create();
    }
}
