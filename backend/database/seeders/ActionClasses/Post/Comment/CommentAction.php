<?php

namespace Database\Seeders\ActionClasses\Post\Comment;

use App\Models\Comment;
use App\Models\Post;

class CommentAction
{
    public function __invoke(Post $post): Comment
    {
        $comment = new Comment();
        $comment->content = fake()->realText(100);
        $post->comments()->save($comment);
        return $comment;
    }
}
