<?php

namespace Database\Seeders;

use App\Models\Post;
use Database\Seeders\ActionClasses\Post\Comment\AuthorAction;
use Database\Seeders\ActionClasses\Post\Comment\CommentAction;
use Database\Seeders\ActionClasses\Post\Comment\LikeAction;
use Database\Seeders\ActionClasses\Post\Comment\ReplyAction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->create();
    }

    private function create()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $commentCount = fake()->numberBetween(2, 20);
            for ($i = 0; $i < $commentCount; $i++) {
                $commentAction = new CommentAction();
                $comment = $commentAction($post);
                // replies
                $countReply = fake()->numberBetween(0, 8);
                for ($j = 0; $j < $countReply; $j++) {
                    $replyAction = new ReplyAction();
                    $reply = $replyAction($comment);
                }
                // author
                new AuthorAction($comment);
                //likes
                $countLike = fake()->numberBetween(0, 2);
                for ($k = 0; $k < $countLike; $k++) {
                    new LikeAction($comment);
                }
            }

        }
    }
}
