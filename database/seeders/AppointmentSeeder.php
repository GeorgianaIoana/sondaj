<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    public function run(): void
    {
       
        Appointment::factory(10)->create();

        Appointment::factory()->create([
            'status' => 'Specific Task Title',   
            'users' => 'users_id',
            'notes' => 'This is a specific task description',  
            'date' => now()->addDays(3), 
        ]);
    }
}
