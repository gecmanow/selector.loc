<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = [
            ['name' => 'Прямые продажи', 'slug' => 'direct_sales', 'callback_data' => '/staff' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Проектные продажи', 'slug' => 'project_sales', 'callback_data' => '/staff' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Снабжение', 'slug' => 'delivery', 'callback_data' => '/staff' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ВЭД', 'slug' => 'ved', 'callback_data' => '/staff' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'HR', 'slug' => 'hr', 'callback_data' => '/staff' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ИТ и маркетинг', 'slug' => 'it_and_marketing', 'callback_data' => '/staff' , 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('departments')->insert($departments);
    }
}
