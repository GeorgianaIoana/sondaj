<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $this->faker->sentence(),  
            'description' => $this->faker->paragraph(),  
            'finished_at' => now()->addDays(3), 
            'done' => $this->faker->boolean(),
        ];
    }
}
