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
                'quantity' => mt_rand(1,1000),
                'completion' => mt_rand(1,1000),
                'image' => 'assets\img\theme\spanner.jpg'
               
            
        ];
    }
}
