<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Work;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\AddressProduct>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
                'workorder_name' => fake()->word(),
                'production_id' => User::inRandomOrder()->first()->id,
                'status' => fake()->randomElement(['new','Running','emergency stop']),
                'planner_id' => '0',
                'completion' => '0',
                'due_date' => fake()->date($format = 'Y-m-d', $min = 'now'),
                'planner_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
               
            
        ];
    }
}
