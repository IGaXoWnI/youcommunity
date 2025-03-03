<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RsvpController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [EventController::class, 'index'])->name('dashboard');
});

Route::resource('events', EventController::class); 

Route::post('events/{event}/rsvp', [RsvpController::class, 'store'])->name('rsvps.store');

Route::post('events/{event}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('events.comments.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
