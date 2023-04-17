<?php

namespace Database\Seeders\ActionClasses\Post\Comment;

use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;
use Database\Seeders\ActionClasses\RandomUserAction;

class ReplyAction
{
    public function __invoke(Comment $comment): Reply
    {
        $reply = new Reply();
        $randomUser = new RandomUserAction();
        $reply->content = fake()->realTextBetween(20, 100);
        $reply->mention = $randomUser()['username'];
        $comment->replies()->save($reply);
        return $reply;
    }
}
