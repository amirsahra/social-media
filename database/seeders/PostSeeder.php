<?php

namespace Database\Seeders;

use Database\Seeders\ActionClasses\Post\PostAction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(PostAction $postAction): void
    {
        for ($i = 0; $i < 50; $i++)
            $postAction();
    }
}
