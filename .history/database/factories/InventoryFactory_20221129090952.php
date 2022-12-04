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

        $image = 'argon\img\theme\spanner.jpg';
        $image2 = 'argon\img\theme\sketch.jpg';
        $image3 = 'argon\img\theme\hammer.jpg';
        $image4 = 'argon\img\theme\measuer.jpg';

        return [
            
                'inventory_name' => fake()->word(),
                'quantity' => mt_rand(1,1000),
                'image' => fake()->randomElement([$image,$image2,$image3,$image4])
               
        ];
    }
}
