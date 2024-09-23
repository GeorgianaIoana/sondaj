<?php
namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Routing\Controller as BaseController; 

class UserController extends BaseController 
{
    public function index()
    {
        $users = User::all();
        return view('index', compact('users'));
    
    }
}
