<?php

namespace Database\Seeders;

use Database\Seeders\ActionClasses\User\UserAction;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run(UserAction $userAction): void
    {
        for ($i = 0; $i < 50; $i++)
            $userAction();
    }

}
