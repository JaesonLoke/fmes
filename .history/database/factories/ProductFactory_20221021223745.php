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
                'workorder_id' => mt_rand(1,10),
                'status' => fake()->boolean('new'|'Running'),
                'operator_id' => mt_rand(1,50),
                'quantity' => mt_rand(1,1000),
                'completion' => mt_rand(0,90),
                'duedate' => fake()->date($format = 'Y-m-d', $max = 'now'),
                'contactnum' => fake()->numerify('01#-### ####'),
                'position' => fake()->jobtitle(),
                'desc' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'image' => 'assets\img\theme\team-1.jpg'
            
        ];
    }
}
