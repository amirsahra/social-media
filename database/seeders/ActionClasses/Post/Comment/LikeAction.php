<?php

namespace Database\Seeders\ActionClasses\Post\Comment;

use App\Models\Comment;
use App\Models\Like;
use App\Models\User;
use Jenssegers\Mongodb\Eloquent\Model;

class LikeAction
{
    public function __construct(Comment $comment)
    {
        $like = new Like();
        $randomAuthor = User::all(['username', 'profile.avatar'])
            ->random()->first();
        $like->username = $randomAuthor->username;
        $like->avatar = $randomAuthor->profile->avatar;
        $comment->likes()->save($like);
    }
}
