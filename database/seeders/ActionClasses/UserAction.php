<?php

namespace Database\Seeders\ActionClasses;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAction
{
    public function __invoke(): void
    {
        $user = new User();
        $user->username = str_replace([' ', '.'], '_', fake()->name());
        $user->email = fake()->unique()->safeEmail();
        $user->email_verified_at = now();
        $user->password = Hash::make('123456789');
        $user->remember_token = Str::random(10);
        $user->save();
    }
}
