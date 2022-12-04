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
        
        $status = fake()->randomElement(['new','Running','emergency']);

        if($status == 'emergency'){
            $quantity = mt_rand(1,1000);

            return [
                

                'product_name' => fake()->company(),
                'workorder_id' => Work::inRandomOrder()->first()->id,
                'status' => 'emergency',
                'operator_id' => User::where('role','1')->inRandomOrder()->first()->id,
                'quantity' => $quantity,
                'completion' => mt_rand(1,$quantity-1),
                'due_date' => fake()->dateTimeBetween('-2 weeks', '+2 weeks'),
                'planner_remark' => fake()->randomElement(['This order is urgent','The order might face low stock in the middle production']),
                'operator_remark' => fake()->randomElement(['The machine for the this is facing rusting problem','Production is going slow because of the stock']),
                'created_at' => fake()->dateTimeBetween('-6 months', 'now'),
                
            
        ];
        }else{

            $quantity = mt_rand(1,1000);

        return [
            
            
            
                'product_name' => fake()->company(),
                'workorder_id' => Work::inRandomOrder()->first()->id,
                'status' => fake()->randomElement(['new','Running']),
                'operator_id' => User::where('role','1')->inRandomOrder()->first()->id,
                'quantity' => $quantity,
                'completion' => mt_rand(1,$quantity),
                'due_date' => fake()->dateTimeBetween('-2 weeks', '+2 weeks'),
                'planner_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'operator_remark' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'created_at' => fake()->dateTimeBetween('-6 months', 'now'),
                
            
        ];
        }

    }
}
