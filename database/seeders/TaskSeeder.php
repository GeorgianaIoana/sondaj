<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
       
        Task::factory(10)->create();

        Task::factory()->create([
            'title' => 'Specific Task Title',   
            'users' => 'users_id',
            'description' => 'This is a specific task description', 
            'finished_at' => now()->addDays(3), 
        ]);
    }
}
