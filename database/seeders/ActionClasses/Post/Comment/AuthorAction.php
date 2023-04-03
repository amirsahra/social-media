<?php

namespace Database\Seeders\ActionClasses\Post\Comment;

use App\Models\Author;
use App\Models\Comment;
use App\Models\User;

class AuthorAction
{
    public function __construct(Comment $comment)
    {
        $author = new Author();
        $randomAuthor = User::all(['username', 'profile.avatar'])
            ->random()->first();
        $author->username = $randomAuthor->username;
        $author->avatar = $randomAuthor->profile->avatar;
        $comment->author()->save($author);
    }
}
