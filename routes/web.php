<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/contact', [ContactController::class, "showForm"])->name('contact.show');
Route::post('/contact', [ContactController::class, "storeMessage"])->name('contact.add');
Route::get('/messages', [ContactController::class, "showMessages"])->name('messages');

Route::get('/about', function () {
    return view('about');
})->name('about');

require __DIR__.'/auth.php';
