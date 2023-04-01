<?php

namespace Database\Seeders;

use Database\Seeders\ActionClasses\Post\PostAction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(PostAction $postAction)
    {
        for ($i = 0; $i < 50; $i++)
            $postAction();
    }
}
