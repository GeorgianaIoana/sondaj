<?php

namespace App\Policies;

use App\Models\Appointment;
use App\Models\User;

class AppointmentPolicy
{
   
    public function view(User $user, Appointment $appointment)
    {
        return true;
    }

   
    public function update(User $user, Appointment $appointment)
    {
       
        return $user->role === 'admin' || $user->id === $appointment->user_id;
    }

   
    public function delete(User $user, Appointment $appointment)
    {
        return $user->role === 'admin';
    }

    
    public function create(User $user)
    {
        return $user->role === 'admin'; 
    }
}
