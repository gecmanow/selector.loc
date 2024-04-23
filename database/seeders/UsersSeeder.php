<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['username' => 'gecmanow', 'email' => 'gecmanow@gmail.com', 'email_verified_at' => null, 'password' => 'password', 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('users')->insert($users);
    }
}
