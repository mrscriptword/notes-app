<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\DailyTaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/notes', [NoteController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NoteController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');
    Route::get('/notes/{note}', [NoteController::class, 'show'])->name('notes.show');
    Route::get('/notes/{note}/edit', [NoteController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{note}', [NoteController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{note}', [NoteController::class, 'destroy'])->name('notes.destroy');
    Route::get('/daily-notes', [NoteController::class, 'dailyNotes'])->name('notes.daily');
    Route::get('/daily-tasks', [DailyTaskController::class, 'index'])->name('daily-tasks.index');
    Route::get('/daily-tasks/create', [DailyTaskController::class, 'create'])->name('daily-tasks.create');
    Route::post('/daily-tasks', [DailyTaskController::class, 'store'])->name('daily-tasks.store');
    Route::get('/daily-tasks/{task}', [DailyTaskController::class, 'show'])->name('daily-tasks.show');
    Route::get('/daily-tasks/{task}/edit', [DailyTaskController::class, 'edit'])->name('daily-tasks.edit');
    Route::put('/daily-tasks/{task}', [DailyTaskController::class, 'update'])->name('daily-tasks.update');
    Route::delete('/daily-tasks/{task}', [DailyTaskController::class, 'destroy'])->name('daily-tasks.destroy');
    Route::post('/notes/{note}/check-completion', [NoteController::class, 'checkCompletion'])->name('notes.check-completion');

});

require __DIR__.'/auth.php';
