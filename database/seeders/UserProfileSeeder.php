<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\ActionClasses\User\EducationAction;
use Database\Seeders\ActionClasses\User\LocationAction;
use Database\Seeders\ActionClasses\User\ProfileAction;
use Database\Seeders\ActionClasses\User\SkillAction;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->create();
    }

    private function create()
    {
        $users = User::all();
        $profileAction = new ProfileAction();
        foreach ($users as $user) {
            $profile = $profileAction($user);
            new EducationAction($profile);
            $numberOfSkills = rand(0, 1);
            for ($i = 0; $i < $numberOfSkills; $i++)
                new SkillAction($profile);
            new LocationAction($profile);
        }

    }
}
