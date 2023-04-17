<?php

namespace Database\Seeders\ActionClasses;

use App\Models\User;

class RandomUserAction
{
    public function __invoke()
    {
        $user = User::all(['username', 'profile.avatar'])
            ->random(1)->toArray();
        return [
            'username'=> $user[0]['username'],
            'avatar'=> $user[0]['profile']['avatar'],
        ];
    }
}
