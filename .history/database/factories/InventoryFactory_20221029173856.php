<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventory;
use App\Models\Work;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\AddressProduct>
 */
class InventoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
                'inventory_name' => fake()->word(),
                'workorder_id' => Work::inRandomOrder()->first()->id,
                'status' => fake()->randomElement(['new','Running','emergency stop']),
                'operator_id' => User::where('role','1')->inRandomOrder()->first()->id,
                'quantity' => mt_rand(1,1000),
                'completion' => mt_rand(1,1000),
                'due_date' => fake()->date($format = 'Y-m-d', $min = 'now'),
                'planner_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'operator_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
               
            
        ];
    }
}
