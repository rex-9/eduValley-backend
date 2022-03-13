<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        // \App\Models\Course::factory(20)->create();
        // \App\Models\Teacher::factory(20)->create();
        // \App\Models\Freevideo::factory(10)->create();
        // \App\Models\Video::factory(10)->create();
        // \App\Models\Audio::factory(10)->create();
        // \App\Models\Book::factory(10)->create();
        \App\Models\Comment::factory(10)->create();
        \App\Models\Upvote::factory(10)->create();
        \App\Models\Downvote::factory(10)->create();
    }
}
