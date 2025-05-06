<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [ContactController::class, "showForm"]);
Route::post('/contact', [ContactController::class, "storeMessage"]);
Route::get('/messages', [ContactController::class, "showMessages"]);
