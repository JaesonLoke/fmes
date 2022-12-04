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

        $name = fake()->username();
        $position = fake()->jobtitle();
        $image = 'assets\img\theme\pic1.jpg';
        $image2 = 'assets\img\theme\pic2.jpg';
        $image3 = 'assets\img\theme\pic3.jpg';
        $image4 = 'assets\img\theme\pic4.jpg';
        $image5 = 'assets\img\theme\pic5.jpg';
        $image6 = 'assets\img\theme\pic6.jpg';

        return [
            'name' => $name,
            'email' => fake()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('secret'), // password
            'remember_token' => Str::random(10),
            'role' => fake()->boolean(),
            'fullname' => fake()->name(),
            'contactnum' => fake()->numerify('01#-### ####'),
            'position' => $position,
            'desc' => "Hi, I am $name . I am a $position.",
            'image' => fake()->randomElement([$image,$image2,$image3,$image4,$image5,$image6])
            
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
