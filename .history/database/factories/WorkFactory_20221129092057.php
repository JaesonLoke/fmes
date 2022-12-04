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
                'due_date' => fake()->dateTimeBetween('-2 weeks', '+2 months'),
                'planner_remark' => fake()->randomElement(['This order is urgent','The order might face low stock in the middle production','Be careful with the r']),
               
            
        ];
    }
}
