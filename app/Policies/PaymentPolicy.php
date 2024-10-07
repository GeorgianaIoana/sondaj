<?php

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Auth\Access\Response;

namespace App\Policies;

use App\Models\Payment;
use App\Models\User;

class PaymentPolicy
{
    
    public function view(User $user, Payment $payment)
    {
        return true; 
    }

    
    public function update(User $user, Payment $payment)
    {
        return $user->role === 'admin' || $user->id === $payment->user_id;
    }

   
    public function delete(User $user, Payment $payment)
    {
        return $user->role === 'admin'; 
    }

   
    public function create(User $user)
    {
        return $user->role === 'admin'; 
    }
}
