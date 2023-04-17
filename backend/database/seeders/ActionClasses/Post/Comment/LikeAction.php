<?php

namespace Database\Seeders\ActionClasses\Post\Comment;

use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Database\Seeders\ActionClasses\RandomUserAction;
use Jenssegers\Mongodb\Eloquent\Model;

class LikeAction
{
    public function __construct(Comment $comment)
    {
        $like = new Like();
        $randomUser = new RandomUserAction();
        $randomAuthor = $randomUser();
        $like->username = $randomAuthor['username'];
        $like->avatar = $randomAuthor['avatar'];
        $comment->likes()->save($like);
    }
}
