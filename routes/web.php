<?php

use App\Http\Controllers\GuestbookController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    $messages = Message::orderBy('created_at', 'desc')->get();

    return view('dashboard', ['messages' => $messages]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/delete-message', [MessageController::class, 'destroy'])->name('delete-message');
    Route::post('/update-message', [MessageController::class, 'update'])->name('update-message');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/messages', [GuestbookController::class, 'showMessages'])->name('messages');
Route::get('/add-message', [GuestbookController::class, 'showForm'])->name('contact.show');
Route::post('/add-message', [GuestbookController::class, 'storeMessage'])->name('contact.add');

Route::get('/about', function () {
    return view('about');
})->name('about');

require __DIR__.'/auth.php';
