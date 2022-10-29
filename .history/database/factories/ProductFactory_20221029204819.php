<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Work;
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
        $quantity = mt_rand(1,1000);
        $status = fake()->randomElement(['new','Running','emergency']);

        if()
        return [
            
            
                'product_name' => fake()->company(),
                'workorder_id' => Work::inRandomOrder()->first()->id,
                'status' => fake()->randomElement(['new','Running','emergency']),
                'operator_id' => User::where('role','1')->inRandomOrder()->first()->id,
                'quantity' => $quantity,
                'completion' => mt_rand(1,$quantity),
                'due_date' => fake()->dateTimeBetween('now', '+4 months'),
                'planner_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'operator_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'created_at' => fake()->dateTimeBetween('-6 months', 'now'),
                
            
        ];
    }
}
