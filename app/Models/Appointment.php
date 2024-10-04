<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        'date',
        'status',
        'notes'
    ];

    protected $casts = [
        'date' => 'date', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeForAuthenticatedUser(Builder $query)
    {
        if (Auth::check()) {
            return $query->where('user_id', Auth::id());
        }

        return $query->whereNull('user_id');  
    }
}
