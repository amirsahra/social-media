<?php

namespace Database\Seeders;

use Database\Seeders\ActionClasses\FriendAction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
