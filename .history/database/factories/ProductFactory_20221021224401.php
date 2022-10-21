<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
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
        $users = App\User::pluck('id')->toArray();
        return [
            
                'product_name' => fake()->word(),
                'workorder_id' => fake()->unique()->numberBetween(1, User::count()),
                'status' => fake()->boolean('new'|'Running'),
                'operator_id' => mt_rand(1,50),
                'quantity' => mt_rand(1,1000),
                'completion' => mt_rand(0,90),
                'due_date' => fake()->date($format = 'Y-m-d', $min = 'now'),
                'planner_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'operator_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
               
            
        ];
    }
}
