<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),  
            'description' => $this->faker->paragraph(),  
            'finished_at' => $this->faker->dateTimeBetween('-1 week', '+1 week'), 
            'done' => $this->faker->boolean(),
        ];
    }
}
