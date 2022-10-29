<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventory;
use App\Models\Report;
use App\Models\Work;
use App\Models\User;
use App\Models\Notification;
use App\Models\Product;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\AddressProduct>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'category' => fake()->randomElement(['done','wasted','emergency stop']),
            'inventory_id' => Inventory::inRandomOrder()->first()->id,
            'quantity' => mt_rand(1,1000),
            'product_id' => Product::inRandomOrder()->first()->id,
            'staff_id' => User::inRandomOrder()->first()->id,
            'detail' => fake()->realText($maxNbChars = 200, $indexSize = 2),
            'created_at' => fake()->date($format = 'Y-m-d', $min = ('Y'-1),
        
    ];

    }
}
