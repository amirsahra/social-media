<?php

namespace Database\Seeders\ActionClasses\User;

use App\Models\Friend;
use App\Models\User;

class FriendAction
{
    public function __invoke(): void
    {
        // TODO clean code
        $users = User::all();
        $friendCount = rand(10,count($users));
        foreach ($users as $user){
            $usersForFriendship = User::all(['username','profile.avatar'])
                ->where('username','<>', $user->username)
                ->random($friendCount);
            foreach ($usersForFriendship as $item){
                $friend = new Friend();
                $friend->username = $item->username;
                $friend->avatar = $item->profile->avatar;
                $user->friends()->save($friend);
            }
        }
    }
}
