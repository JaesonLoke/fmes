<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Inventory;
use App\Models\Report;
use App\Models\Work;
use App\Models\User;
use App\Models\Product;
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
        $productid = Product::inRandomOrder()->first()->id;

        $workid = Work::where('id',$productid);

        return [
            
            'ProductOrWork' => 'product',
            'ProductID' => fake()->safeEmail(),
            'WorkID' => $workid,
            'ReporterID' => Hash::make('secret'), // password
            'category' => Str::random(10),
            'detail' => fake()->boolean(),
            'inventory_id' => Inventory::inRandomOrder()->first()->id,
            'wastedquantity' => mt_rand(1,100),     
            
        ];
    }
}
