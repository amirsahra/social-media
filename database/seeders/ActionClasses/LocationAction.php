<?php

namespace Database\Seeders\ActionClasses;

use App\Models\Location;
use App\Models\Profile;

class LocationAction
{
    public function __construct(Profile $profile)
    {
        $location = new Location();
        $location->country = fake()->country();
        $location->city = fake()->city();
        $location->address = fake()->address();
        $profile->location()->save($location);
    }
}
