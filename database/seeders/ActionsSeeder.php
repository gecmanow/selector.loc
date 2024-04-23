<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actions = [
            ['name' => 'Зайти', 'slug' => 'enter', 'callback_data' => '/departments' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Перезвонить', 'slug' => 'callback', 'callback_data' => '/departments' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Назначить Zoom', 'slug' => 'zoom', 'callback_data' => '/departments' , 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('actions')->insert($actions);
    }
}
