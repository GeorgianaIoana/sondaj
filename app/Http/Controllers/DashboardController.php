<?php

namespace App\Http\Controllers;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth; 

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Logica pentru a obține informațiile de pe dashboard
        $user = auth()->user();
        $appointments = Appointment::where('user_id', $user->id)->get();
        
        return view('dashboard.index', compact('user', 'appointments'));
    }
}
