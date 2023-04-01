<?php

namespace Database\Seeders;

use Database\Seeders\ActionClasses\User\FriendAction;
use Illuminate\Database\Seeder;

class UserFriendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FriendAction $friendAction)
    {
        $friendAction();
    }
}
