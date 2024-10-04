<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Payment;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    
    protected $model = Payment::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'invoice' => 'Invoice file path', 
            'paid' => $this->faker->boolean(),
            'payment_date' => now()->addDays(3), 
            'pay_day' => '1',
        ];
    }
}
