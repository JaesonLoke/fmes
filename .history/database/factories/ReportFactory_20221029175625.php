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
            'ReporterID' => Hash::make('secret'), // password
            'category' => Str::random(10),
            'detail' => fake()->boolean(),
            'inventory_id' => fake()->name(),
            'wasted' => fake()->numerify('01#-### ####'),
            'position' => fake()->jobtitle(),
            'desc' => fake()->realText($maxNbChars = 200, $indexSize = 2),
            'image' => 'assets\img\theme\team-1.jpg'
        ];
               
            
        ];
    }
}
