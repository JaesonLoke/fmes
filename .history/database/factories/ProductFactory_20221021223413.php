<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\AddressProduct>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
                'product_name' => fake()->word(),
                'workorder_id' => mt_rand,
                'email_verified_at' => now(),
                'password' => Hash::make('secret'), // password
                'remember_token' => Str::random(10),
                'role' => fake()->boolean(),
                'fullname' => fake()->name(),
                'contactnum' => fake()->numerify('01#-### ####'),
                'position' => fake()->jobtitle(),
                'desc' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'image' => 'assets\img\theme\team-1.jpg'
            
        ];
    }
}
