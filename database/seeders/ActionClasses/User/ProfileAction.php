<?php

namespace Database\Seeders\ActionClasses\User;

use App\Models\Profile;
use App\Models\User;

class ProfileAction
{
    public function __invoke(User $user): Profile
    {
        $gender = fake()->randomElement(['male', 'female']);
        $profile = new Profile();
        $profile->first_name = fake()->firstName($gender);
        $profile->last_name = fake()->lastName();
        $profile->gender = $gender;
        $profile->birthday = fake()->dateTimeBetween('1990-01-01', '2013-01-01')
            ->format('d/m/Y');
        $profile->avatar = 'image/avatars/ActionClasses.png';
        $profile->banner = 'image/avatars/banner.png';
        $profile->bio = fake()->text();
        $user->profile()->save($profile);
        return $profile;
    }
}
