<?php
namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Routing\Controller as BaseController; 

class UserController extends BaseController 
{
// Constructor pentru a aplica middleware
public function __construct()
{
    // Aplica middleware-ul pentru a verifica rolul
    $this->middleware('role:admin')->only(['index', 'edit', 'update', 'destroy']);
}


    public function index()
    {
        $this->authorize('viewAny', User::class); // Verifică permisiunea de a vizualiza toți utilizatorii
        $users = User::all();
        return view('index', compact('users'));
    
    }
}
