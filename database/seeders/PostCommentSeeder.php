<?php

namespace Database\Seeders;

use App\Models\Post;
use Database\Seeders\ActionClasses\Post\Comment\CommentAction;
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
            for ($i = 0; $i < $commentCount; $i++){
                $commentAction = new CommentAction();
                $comments = $commentAction($post);
            }

        }
    }
}
