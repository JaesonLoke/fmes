<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Work;
use App\Models\User;
use App\Models\Production;
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
            
                'workorder_name' => fake()->company(),
                'production_id' => Production::inRandomOrder()->first()->id,
                'status' => fake()->randomElement(['new','Running','emergency']),
                'planner_id' => User::where('role','1')->inRandomOrder()->first()->id,
                'completion' => '0',
                'due_date' => fake()->dateTimeBetween(                'due_date' => fake()->dateTimeBetween('-2 weeks', '+2 weeks'),
            ),
                'planner_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
               
            
        ];
    }
}
