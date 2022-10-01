<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('productions')->insert([
            'production_line' => 'P1',
            'status' => 'new',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('workorders')->insert([
            'workorder_name' => 'WO1',
            'production_id' => '1',
            'planner_id' => '1',
            'due_date' => '2023-10-10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')->insert([
            'product_name' => 'Product1',
            'workorder_id' => '1',
            'operator_id' => '1',
            'quantity' => '100',
            'due_date' => '2023-10-10',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('reports')->insert([
            'title' => 'machine',
            'ProductOrWork' => 'product',
            'ProductID' => '1',
            'WorkID' => '123',
            'detail' => 'machine stop',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('reports')->insert([
            'title' => 'production',
            'ProductOrWork' => 'work',
            'ProductID' => '',
            'WorkID' => '123',
            'detail' => 'production stop',
            ''
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
