<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\ToDoFactory;
use App\Models\ToDo;

class ToDoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ToDo::factory()->count(50)->create();
    }
}
