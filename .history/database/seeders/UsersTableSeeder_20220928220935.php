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

        DB::table('production')->insert([
            'production_line' => 'P1',
            'status' => 'new',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('workorder')->insert([
            'workorder' => 'P1',
            'status' => 'new',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
