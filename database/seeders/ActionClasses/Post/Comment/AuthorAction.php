<?php

namespace Database\Seeders\ActionClasses\Post\Comment;

use App\Models\Author;
use App\Models\Comment;
use Database\Seeders\ActionClasses\RandomUserAction;

class AuthorAction
{
    public function __construct(Comment $comment)
    {
        $author = new Author();
        $randomUser = new RandomUserAction();
        $randomAuthor = $randomUser();
        $author->username = $randomAuthor['username'];
        $author->avatar = $randomAuthor['avatar'];
        $comment->author()->save($author);
    }
}
