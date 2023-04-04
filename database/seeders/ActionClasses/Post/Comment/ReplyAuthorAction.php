<?php

namespace Database\Seeders\ActionClasses\Post\Comment;

use App\Models\Author;
use App\Models\Comment;
use App\Models\Reply;
use Database\Seeders\ActionClasses\RandomUserAction;

class ReplyAuthorAction
{
    public function __construct(Reply $reply)
    {
        $author = new Author();
        $randomUser = new RandomUserAction();
        $randomAuthor = $randomUser();
        $author->username = $randomAuthor['username'];
        $author->avatar = $randomAuthor['avatar'];
        $reply->author()->save($author);
    }
}
