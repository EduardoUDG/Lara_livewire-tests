<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Directory about post
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');

        \App\Models\Post::factory(10)->create();
    }
}

