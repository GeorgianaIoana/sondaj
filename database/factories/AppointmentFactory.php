<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Appointment;
use App\Models\User;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'date' => now()->addDays(3), 
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']), 
            'notes' => $this->faker->sentence(), 
        ];
    }
}

