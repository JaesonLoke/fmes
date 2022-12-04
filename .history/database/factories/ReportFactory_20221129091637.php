<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventory;
use App\Models\Report;
use App\Models\Work;
use App\Models\User;
use App\Models\Product;
use Carbon\Carbon;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\\AddressProduct>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $category = fake()->randomElement(['Machine','Wasted Inventory']);

        if($category == 'Machine'){

        $productid = Product::inRandomOrder()->first()->id;
        $workid = Product::where('id',$productid)->first()->workorder_id;

        return [
            
            'ProductOrWork' => 'product',
            'ProductID' => $productid,
            'WorkID' => $workid,
            'ReporterID' => User::inRandomOrder()->first()->id,
            'category' => $category,
            'detail' => "Product $productid is down due to Machine  ",
            'created_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ];

        }else{
            $productid = Product::inRandomOrder()->first()->id;
            $workid = Product::where('id',$productid)->first()->workorder_id;

            return [
                
                'ProductOrWork' => 'product',
                'ProductID' => $productid,
                'WorkID' => $workid,
                'ReporterID' => User::inRandomOrder()->first()->id,
                'category' => $category,
                'detail' => fake()->realText($maxNbChars = 200, $indexSize = 2),
                'inventory_id' => Inventory::inRandomOrder()->first()->id,
                'wastedquantity' => mt_rand(1,100),
                'created_at' => fake()->dateTimeBetween('-6 months', 'now'),
                
            ];
        }


    }
}
