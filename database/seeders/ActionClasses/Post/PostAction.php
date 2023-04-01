<?php

namespace Database\Seeders\ActionClasses\Post;

use App\Models\Post;
use App\Models\User;

class PostAction
{
    public function __invoke(): void
    {
        $post = new Post();
        $post->user_id =User::all('_id')->random(1)->first()->id;
        $post->title = fake()->title;
        //TODO
        $post->save();
    }
}
