<?php

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[CalendarController::class , "index"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post("/calendar/store" , [CalendarController::class , "store"]);
Route::get("/calendar/show" , [CalendarController::class , "show"]);

require __DIR__.'/auth.php';
