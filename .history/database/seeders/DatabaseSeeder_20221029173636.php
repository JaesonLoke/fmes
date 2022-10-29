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
        \App\Models\Production::factory(50)->create();
        \App\Models\Work::factory(50)->create();
        \App\Models\Prodicu::factory(50)->create();

        $this->call([UsersTableSeeder::class]);


    }
}
