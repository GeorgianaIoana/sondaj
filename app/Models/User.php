<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'date_of_birth',
        'city',
        'status',
        'image',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    protected $casts = [
        'status' => 'boolean',
    ];
}
