<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(50)->create();
        \App\Models\Production::factory(10)->create();
        \App\Models\Work::factory(30)->create();
        \App\Models\Product::factory(200)->create();
        \App\Models\Inventory::factory(50)->create();
        \App\Models\Report::factory(50)->create();
        \App\Models\Notification::factory(50)->create();

        $this->call([UsersTableSeeder::class]);


    }
}
