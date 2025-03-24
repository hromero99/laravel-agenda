<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalendarEventController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/events', [CalendarEventController::class, 'index'])->middleware(['auth', 'verified'])->name('events');
Route::post('/events/create', [CalendarEventController::class, 'create'])->middleware(['auth', 'verified'])->name('events.create');

Route::get('/students', [StudentController::class, 'index'])->name('students');
Route::post('/students/create', [StudentController::class, 'create'])->name('students.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
