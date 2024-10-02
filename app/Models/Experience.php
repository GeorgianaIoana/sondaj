<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $fillable = [
        'level', // Adaugă câmpurile pe care vrei să le poți umple
    ];

    // Dacă Experience are o relație cu User
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
