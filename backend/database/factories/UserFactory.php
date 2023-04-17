<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);
        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'remember_token' => Str::random(10),
            /*'profile' => [
                'first_name' => $this->faker->firstName($gender),
                'last_name' => $this->faker->lastName(),
                'gender' => $gender,
                'birthday' => $this->faker->dateTimeBetween('1990-01-01', '2013-01-01')
                    ->format('d/m/Y'),
                'avatar' => 'image/avatars/ActionClasses.png',
                'banner' => 'image/avatars/banner.png',
                'bio' => $this->faker->text(),
                'education' => [
                    'degree' => $this->faker
                        ->randomElement(['Associate', 'Bachelor’s', 'Master’s', 'Doctoral']),
                    'name' => '',
                    'country' => $this->faker->country(),
                    'city' => ''
                ],
                'skills' => [
                    'title' => $this->faker->jobTitle()
                ],
                'location' => [
                    'country' => $this->faker->country(),
                    'city' => $this->faker->city(),
                    'address' => ''
                ]
            ],*/
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
