<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\UserResource;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/test', function () {
//     return response()->json(['message' => 'API works!']);
// });

Route::get('/users', function () {
    return UserResource::collection(User::all());
})->name('api.users');


