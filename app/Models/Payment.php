<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pay_day',
        'paid',
        "invoice",
        "payment_date",
    ];

    protected $casts = [
        'payment_date' => 'date', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
