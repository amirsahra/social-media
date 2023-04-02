<?php

namespace Database\Seeders\ActionClasses\Post;

use App\Models\Post;
use App\Models\User;

class PostAction
{
    public function __invoke(): void
    {
        $postType = fake()->randomElement(['text', 'image', 'video']);
        $post = new Post();
        $post->user_id = User::all('_id')->random(1)->first()->id;
        $post->title = fake()->title;
        $post->type = $postType;
        $post->body = fake()->realText();
        if ($postType == 'image')
            $post->image = 'image/posts/image (' . fake()->numberBetween(1, 86) . ').jpg';
        if ($postType == 'video')
            $post->video = 'videos/posts/video (' . fake()->numberBetween(1, 10) . '.mp4';
        $post->save();
    }
}
