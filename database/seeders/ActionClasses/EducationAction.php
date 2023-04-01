<?php

namespace Database\Seeders\ActionClasses;

use App\Models\Education;
use App\Models\Profile;

class EducationAction
{
    public function __construct(Profile $profile)
    {
        $education = new Education();
        $education->degree = fake()->randomElement(['Associate', 'Bachelor’s', 'Master’s', 'Doctoral']);
        $education->title = fake()->randomElement(['Architecture', 'Pharmaceutics ', 'Laws', 'Divinity', 'Psychiatry',
            'Electronics', 'Chemistry', 'Parasitology', 'Civil Engineering', 'Public health']);
        $profile->educations()->save($education);
    }

}
