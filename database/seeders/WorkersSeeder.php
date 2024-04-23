<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workers = [
            ['name' => 'Иван', 'surname' => 'Иванов', 'patronymic' => 'Иванович', 'slug' => 'worker1', 'callback_data' => '/departments' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Антон', 'surname' => 'Антонов', 'patronymic' => 'Антонович', 'slug' => 'worker2', 'callback_data' => '/departments' , 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Сергей', 'surname' => 'Сергеев', 'patronymic' => 'Сергеевич', 'slug' => 'worker3', 'callback_data' => '/departments' , 'created_at' => now(), 'updated_at' => now()]
        ];

        DB::table('workers')->insert($workers);
    }
}
