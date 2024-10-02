<?php

use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware(['auth'])->prefix('admin')->group(function () {
//     Route::get('payments', [PaymentController::class, 'index'])->name('payments.index');
//     Route::get('payments/create', [PaymentController::class, 'create'])->name('payments.create');
//     Route::post('payments', [PaymentController::class, 'store'])->name('payments.store');
//     Route::get('payments/{record}/edit', [PaymentController::class, 'edit'])->name('payments.edit');
//     Route::put('payments/{record}', [PaymentController::class, 'update'])->name('payments.update');
//     Route::delete('payments/{record}', [PaymentController::class, 'destroy'])->name('payments.destroy');
// });