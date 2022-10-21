<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->username(),
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('secret'), // password
            'remember_token' => Str::random(10),
            'role' => mt_rand(0,1),
            'fullname' => fake()->name(),
            'contactnum' => fake()->numerify('01#-### ####'),
            'position' => fake()->jobtitle(),
            'desc' => fake()->realText($maxNbChars = 200, $indexSize = 2),
            'image'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
