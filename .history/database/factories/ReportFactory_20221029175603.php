<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventory;
use App\Models\Work;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\AddressProduct>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'ProductOrWork' => fake()->username(),
            'ProductID' => fake()->safeEmail(),
            'WorkID' => now(),
            'ReportOD' => Hash::make('secret'), // password
            'remember_token' => Str::random(10),
            'role' => fake()->boolean(),
            'fullname' => fake()->name(),
            'contactnum' => fake()->numerify('01#-### ####'),
            'position' => fake()->jobtitle(),
            'desc' => fake()->realText($maxNbChars = 200, $indexSize = 2),
            'image' => 'assets\img\theme\team-1.jpg'
        ];
               
            
        ];
    }
}
