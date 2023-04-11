<?php

namespace App\Http\Controllers\V1\Auth\ActionClasses;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserAction
{
    public function __invoke(array $userInfo): User
    {
        $user = new User();
        $user->username = $userInfo['username'];
        $user->email = $userInfo['email'];
        $user->password = Hash::make($userInfo['password']);
        $user->save();
        return $user;
    }
}
