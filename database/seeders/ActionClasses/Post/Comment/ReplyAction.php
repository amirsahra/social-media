<?php

namespace Database\Seeders\ActionClasses\Post\Comment;

use App\Models\Comment;
use App\Models\Reply;

class ReplyAction
{
    public function __invoke(Comment $comment): Reply
    {
        $reply = new Reply();
        $reply->content = fake()->realTextBetween(20, 100);
        $comment->replies()->save($reply);
        return $reply;
    }
}
