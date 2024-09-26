<?php

namespace Database\Factories;

use App\Models\Appointment;
use App\Models\User; 
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(), 
            'date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']), 
            'notes' => $this->faker->sentence(), 
        ];
    }
}

