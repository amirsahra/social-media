<?php

namespace Database\Seeders\ActionClasses;

use App\Models\Profile;
use App\Models\Skill;

class SkillAction
{
    public function __construct(Profile $profile)
    {
        $skill = new Skill();
        $skill->title = fake()->jobTitle();
        $profile->skills()->save($skill);
    }
}
